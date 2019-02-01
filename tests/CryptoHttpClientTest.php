<?php

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\CryptoSDK;
use function Tesseract\Crypto\SDK\encryption;
use Tesseract\Crypto\SDK\Http\Header;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;
use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\Options\Config;
use Tesseract\Crypto\SDK\Options\HttpClientConfig;
use Tesseract\Crypto\SDK\Representations\Enums\HashAlgorithm;
use Tesseract\Crypto\SDK\Representations\Enums\LicenseStatus;
use Tesseract\Crypto\SDK\Representations\HATEOAS\Paged;
use Tesseract\Crypto\SDK\Representations\Enums\Mode;
use Tesseract\Crypto\SDK\Representations\Enums\TokenStatus;
use Tesseract\Crypto\SDK\Representations\Enums\TokenType;
use Tesseract\Crypto\SDK\Representations\Enums\Transformation;
use function Tesseract\Crypto\SDK\to_array;

/**
 * Class CryptoHttpClientTest
 */
final class CryptoHttpClientTest extends TestCase
{
    /**
     * @var int
     */
    const ROLE_ID = 1;

    /**
     *
     * @var int
     */
    const INSTITUTION_ID = 1;

    /**
     * @var int
     */
    const LICENSE_ID = 1;

    /**
     * @var int
     */
    const TOKEN_ID = 1;

    /**
     * @var int
     */
    const APP_ID = 1;

    /**
     * @var \Tesseract\Crypto\SDK\HttpClient
     */
    protected $sdk;

    /**
     *
     */
    public function setUp()
    {
        $configs = include('config.php');
        $configs = $configs[$configs['connection']];
        $config = new HttpClientConfig($configs[Config::BASE_URL], $configs[Config::ACCESS_KEY_ID], $configs[Config::SECRET_ACCESS_KEY], $configs[Config::DEBUG], $configs[Config::TIMEOUT]);
        $this->sdk = new CryptoSDK($config);
    }

    /**
     * @throws Exception
     */
    public function testURI()
    {

        $uri = (new UriBuilder(URI::TOKENS))
            ->addPathParam(PathParam::LICENSE_ID, 1)
            ->addQueryParam(QueryParam::PAGE, 0)
            ->addQueryParam(QueryParam::SIZE, 20)
            ->addQueryParam(QueryParam::TOKEN_STATUS, TokenStatus::ACTIVE)
            ->addQueryParam(QueryParam::TOKEN_TYPE, TokenType::CHALLENGE_RESPONSE)
            ->build();

        $this->assertEquals('/api/v2/institution/licenses/1/tokens?page=0&size=20&token_status=ACTIVE&token_type=CHALLENGE_RESPONSE', $uri);

    }

    /**
     * @throws Exception
     */
    public function testRawAuth()
    {
        $response = $this->sdk->auth();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @depends testRawAuth
     * @return array
     * @throws Exception
     */
    public function testRawRoles()
    {
        $response = $this->sdk->roles();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);
        return $body[Paged::_CONTENT];
    }

    /**
     * @depends testRawAuth
     * @throws Exception
     */
    public function testRawRole()
    {
        $response = $this->sdk->role(self::ROLE_ID);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawInstitution()
    {
        $response = $this->sdk->institution();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @return mixed
     * @throws Exception
     */
    public function testRawLicenses()
    {
        $response = $this->sdk->licenses();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());

        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);

        return $body[Paged::_CONTENT];
    }

    /**
     *
     * @throws Exception
     */
    public function testRawLicense()
    {
        $response = $this->sdk->license(self::LICENSE_ID);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }



    /**
     * @throws Exception
     */
    public function testRawTokens()
    {
        $response = $this->sdk->tokens(self::LICENSE_ID);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());

        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);

        return $body[Paged::_CONTENT];
    }

    /**
     * @return array
     * @throws Exception
     */
    public function testRawCreateToken()
    {
        $token = [
            'token_type' => TokenType::FOR_EVENT
        ];

        $response = $this->sdk->createToken(self::LICENSE_ID, $token);
        $this->assertEquals(StatusCode::CREATED, $response->getStatusCode());

        return to_array($response->getBody());
    }

    /**
     * @throws Exception
     */
    public function testRawCreateTokenBadRequest()
    {
        $token = array();
        try {
            $response = $this->sdk->createToken(self::LICENSE_ID, $token);
            $this->assertEquals(StatusCode::CREATED, $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ClientException $exception) {
            $this->assertEquals(StatusCode::BAD_REQUEST, $exception->getCode());
        }
    }

    /**
     * @depends testRawCreateToken
     * @param array $token
     * @return array
     * @throws Exception
     */
    public function testRawToken(array $token)
    {
        $response = $this->sdk->token(self::LICENSE_ID, $token['id']);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawEnrollmentString(array $token)
    {
        $response = $this->sdk->enrollmentString(self::LICENSE_ID, $token['id']);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawActCode(array $token)
    {
        $response = $this->sdk->actCode(self::LICENSE_ID, $token['id']);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawChallenge(array $token)
    {
        $token = to_array($this->sdk->token(self::LICENSE_ID, $token['id'])->getBody());
        $this->assertEquals(TokenStatus::ACTIVE, $token['token_status']);
        $this->assertEquals(TokenType::CHALLENGE_RESPONSE, $token['token_type']);
        $response = $this->sdk->challenge(self::LICENSE_ID, $token['id']);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawValidate(array $token)
    {
        $token = to_array($this->sdk->token(self::LICENSE_ID, $token['id'])->getBody());
        $this->assertEquals(TokenStatus::ACTIVE, $token['token_status']);
        $this->assertEquals(TokenType::CHALLENGE_RESPONSE, $token['token_type']);

        $validate = [
            'result' => '876278'
        ];

        $response = $this->sdk->validate(self::LICENSE_ID, $token['id'], $validate);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawValidateBadRequest(array $token)
    {
        $validate = [
            'results' => '876278'
        ];

        try {
            $response = $this->sdk->validate(self::LICENSE_ID, $token['id'], $validate);
            $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ClientException $exception){
            $this->assertEquals(StatusCode::BAD_REQUEST, $exception->getCode());
        }
    }

    /**
     *
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawValidateConflict(array $token)
    {
        $validate = [
            'result' => '876278'
        ];

        try {
            $response = $this->sdk->validate(self::LICENSE_ID, $token['id'], $validate);
            $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ClientException $exception){
            $this->assertEquals(StatusCode::CONFLICT, $exception->getCode());
        }
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawPutToken(array $token)
    {
        $token['token_status'] = TokenStatus::BLOCKED;
        $response = $this->sdk->putToken(self::LICENSE_ID, $token['id'], $token);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawDeleteToken(array $token)
    {
        $response = $this->sdk->deleteToken(self::LICENSE_ID, $token['id']);
        $this->assertEquals(StatusCode::NO_CONTENT, $response->getStatusCode());
    }

    /**
     * @return array
     * @throws Exception
     */
    public function testRawApps()
    {
        $response = $this->sdk->apps();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);
        return $body[Paged::_CONTENT];
    }

    /**
     * @throws Exception
     */
    public function testRawCreateApp()
    {
        $app = [
            'name' => 'Crypto HTTP Client Test'
        ];

        $response = $this->sdk->createApp($app);

        $this->assertEquals(StatusCode::CREATED, $response->getStatusCode());
        $this->assertTrue($response->hasHeader(Header::LOCATION));

        return $response->getHeaderLine(Header::LOCATION);
    }

    /**
     * @depends testRawCreateApp
     * @param string $location
     * @return array
     * @throws Exception
     */
    public function testRawApp(string $location)
    {
        $response = $this->sdk->get($location);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @depends testRawApp
     * @depends testRawRoles
     * @param array $app
     * @param array $roles
     * @throws Exception
     * @return array
     */
    public function testRawPutApp(array $app, array $roles)
    {
        foreach ($roles as $role)
            array_push($app['roles'], $role['name']);
        $response = $this->sdk->putApp($app['id'], $app);
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        return to_array($response->getBody());
    }

    /**
     * @depends testRawPutApp
     * @param array $app
     * @throws Exception
     */
    public function testRawDeleteApp(array $app)
    {
        $response = $this->sdk->deleteApp($app['id']);
        $this->assertEquals(StatusCode::NO_CONTENT, $response->getStatusCode());
    }

    /**
     * @depends testRawApps
     * @param array $apps
     * @throws Exception
     */
    public function testRawDeleteAppByEnabled(array $apps)
    {
        foreach ($apps as $app)
        {
            if($app['enabled'] === FALSE)
            {
                $response = $this->sdk->deleteApp($app['id']);
                $this->assertEquals(StatusCode::NO_CONTENT, $response->getStatusCode());
            }
        }
    }

    /**
     * @throws Exception
     */
    public function testRawPartition()
    {
        $response = $this->sdk->partition();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawKeys()
    {
        $response = $this->sdk->keys();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $this->assertArrayHasKey(Paged::_CONTENT, $body);
        return $body[Paged::_CONTENT];
    }

    /**
     * @throws Exception
     */
    public function testRawHash()
    {
        foreach (HashAlgorithm::ALGORITHMS as $algorithm)
        {
            $hash = [
                'message' => 'secret',
                'algorithm' => $algorithm,
            ];

            $response = $this->sdk->hash($hash);
            $this->assertEquals(StatusCode::OK, $response->getStatusCode());
        }
    }

    const SECRET = 'secret';

    /**
     * @depends testRawKeys
     * @param array $keys
     * @throws Exception
     */
    public function testRawAes(array $keys)
    {
        foreach ($keys as $key)
        {
            if(encryption($key['algorithm_encryption']) == 'AES')
            {
                $alias = $key['alias'];

                foreach (Transformation::TRANSFORMATIONS as $transformation)
                {
                    $body = [
                        'message' => self::SECRET,
                        'mode' => Mode::ENCRYPT,
                        'transformation' => $transformation
                    ];

                    $response = $this->sdk->aes($alias, $body);
                    $this->assertEquals(StatusCode::OK, $response->getStatusCode());

                    $body = to_array($response->getBody());
                    $body['mode'] = Mode::DECRYPT;

                    $response = $this->sdk->aes($alias, $body);
                    $this->assertEquals(StatusCode::OK, $response->getStatusCode());

                    $body = to_array($response->getBody());
                    $this->assertEquals(self::SECRET, $body['message']);
                }

            }
        }
    }

}