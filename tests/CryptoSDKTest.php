<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\CryptoSDK;
use function Tesseract\Crypto\SDK\encryption;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;
use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\Options\Config;
use Tesseract\Crypto\SDK\Options\HttpClientConfig;
use Tesseract\Crypto\SDK\Representations\HashAlgorithm;
use Tesseract\Crypto\SDK\Representations\Mode;
use Tesseract\Crypto\SDK\Representations\TokenStatus;
use Tesseract\Crypto\SDK\Representations\TokenType;
use Tesseract\Crypto\SDK\Representations\Transformation;
use function Tesseract\Crypto\SDK\to_array;

/**
 *
 * Class CryptoSDKTest
 */
final class CryptoSDKTest extends TestCase
{

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

        $this->assertSame('/api/v2/institution/licenses/1/tokens?page=0&size=20&token_status=ACTIVE&token_type=CHALLENGE_RESPONSE', $uri);

    }

    /**
     * @throws Exception
     */
    public function testRawAuth()
    {
        $response = $this->sdk->auth();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawInstitution()
    {
        $response = $this->sdk->institution();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawLicenses()
    {
        $response = $this->sdk->licenses();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawLicense()
    {
        $response = $this->sdk->license(self::LICENSE_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawTokens()
    {
        $response = $this->sdk->tokens(self::LICENSE_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
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
        $this->assertSame(StatusCode::CREATED, $response->getStatusCode());

        return to_array($response->getBody());
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
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
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
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawActCode(array $token)
    {
        $response = $this->sdk->actCode(self::LICENSE_ID, $token['id']);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawChallenge(array $token)
    {
        $token = to_array($this->sdk->token(self::LICENSE_ID, $token['id'])->getBody());
        $this->assertSame(TokenStatus::ACTIVE, $token['token_status']);
        $this->assertSame(TokenType::CHALLENGE_RESPONSE, $token['token_type']);
        $response = $this->sdk->challenge(self::LICENSE_ID, $token['id']);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
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
        $this->assertSame(TokenStatus::ACTIVE, $token['token_status']);
        $this->assertSame(TokenType::CHALLENGE_RESPONSE, $token['token_type']);

        $validate = [
            'result' => '876278'
        ];

        $response = $this->sdk->validate(self::LICENSE_ID, $token['id'], $validate);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
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
            $this->assertSame(StatusCode::OK, $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ClientException $exception){
            $this->assertSame(StatusCode::BAD_REQUEST, $exception->getCode());
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
            $this->assertSame(StatusCode::OK, $response->getStatusCode());
        } catch (\GuzzleHttp\Exception\ClientException $exception){
            $this->assertSame(StatusCode::CONFLICT, $exception->getCode());
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
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @depends testRawToken
     * @param array $token
     * @throws Exception
     */
    public function testRawDeleteToken(array $token)
    {
        $response = $this->sdk->deleteToken(self::LICENSE_ID, $token['id']);
        $this->assertSame(StatusCode::NO_CONTENT, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawApps()
    {
        $response = $this->sdk->apps();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawApp()
    {
        $response = $this->sdk->app(self::APP_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawPartition()
    {
        $response = $this->sdk->partition();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawKeys()
    {
        $response = $this->sdk->keys();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());

        return to_array($response->getBody())['_content'];
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
            $this->assertSame(StatusCode::OK, $response->getStatusCode());
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
                    $this->assertSame(StatusCode::OK, $response->getStatusCode());

                    $body = to_array($response->getBody());
                    $body['mode'] = Mode::DECRYPT;

                    $response = $this->sdk->aes($alias, $body);
                    $this->assertSame(StatusCode::OK, $response->getStatusCode());

                    $body = to_array($response->getBody());
                    $this->assertSame(self::SECRET, $body['message']);
                }

            }
        }
    }

}
