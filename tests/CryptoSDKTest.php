<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\CryptoSDK;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;
use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\HttpClient;
use Tesseract\Crypto\SDK\Options\Config;
use Tesseract\Crypto\SDK\Options\HttpClientConfig;
use Tesseract\Crypto\SDK\Representations\HATEOAS\LicensePage;
use Tesseract\Crypto\SDK\Representations\HATEOAS\PageContainer;
use Tesseract\Crypto\SDK\Representations\License;
use Tesseract\Crypto\SDK\Representations\Token;
use Tesseract\Crypto\SDK\Representations\TokenStatus;
use Tesseract\Crypto\SDK\Representations\TokenType;
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
     * @var \Tesseract\Crypto\SDK\HttpClient
     */
    private $sdk;

    /**
     * @var int
     */
    private $tokenId;

    /**
     *
     */
    public function setUp()
    {
        $configs = include('config.php');
        $configs = $configs['sandbox'];

        $configs[Config::DEBUG] = true;

        $config = new HttpClientConfig($configs[Config::BASE_URL], $configs[Config::ACCESS_KEY_ID], $configs[Config::SECRET_ACCESS_KEY], $configs[Config::DEBUG], $configs[Config::TIMEOUT]);
        $this->sdk = new CryptoSDK($config);
    }

    /**
     * @return \Tesseract\Crypto\SDK\HttpClient
     */
    public function sdk() : HttpClient
    {
        return $this->sdk;
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
        $response = $this->sdk()->auth();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawInstitution()
    {
        $response = $this->sdk()->institution();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawLicenses()
    {
        $response = $this->sdk()->licenses();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testRawLicenseById()
    {
        $response = $this->sdk()->licenseById(self::LICENSE_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawTokens()
    {
        $response = $this->sdk()->tokensByLicenseId(self::LICENSE_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawCreateTokenByLicenseId()
    {
        $token = [
            'token_type' => TokenType::CHALLENGE_RESPONSE
        ];

        $response = $this->sdk()->createTokenByLicenseId(self::LICENSE_ID, $token);
        $token = to_array($response->getBody());
        $this->tokenId = $token['id'];
        print_r([$this->tokenId]);
        $this->assertSame(StatusCode::CREATED, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawTokenByLicenseIdAndTokenId()
    {
        $response = $this->sdk()->tokenByLicenseIdAndTokenId(self::LICENSE_ID, self::TOKEN_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawUpdateTokenByLicenseIdAndTokenId()
    {

        print_r([$this->tokenId]);

        $response = $this->sdk()->tokenByLicenseIdAndTokenId(self::LICENSE_ID, self::TOKEN_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());

        $token = to_array($response->getBody());
        $token['token_status'] = TokenStatus::REVOKED;

        $response = $this->sdk()->updateTokenByLicenseIdAndTokenId(self::LICENSE_ID, self::TOKEN_ID, $token);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testRawEnrollmentString()
    {
        $response = $this->sdk()->enrollmentStringByLicenseIdAndTokenId(self::LICENSE_ID, self::TOKEN_ID);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function ReadAllLicenses()
    {
        $response = $this->sdk()->licenses();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $licenses = new PageContainer($body);
        $this->licenses($licenses->content(License::class));
        $number = $licenses->page()->number + 1;
        $totalPages = $licenses->page()->total_pages;

        for ($i = $number; $i < $totalPages; $i++)
        {
            $response = $this->sdk()->licenses($i);
            $this->assertSame(StatusCode::OK, $response->getStatusCode());
        }
    }

    const LICENSE_FORMAT = "| %3s | %5s | %5s | %4s | %9s | %8s |\n";

    /**
     * @param array $licenses
     * @throws Exception
     */
    public function licenses(array $licenses)
    {
        foreach ($licenses as $license)
        {
            echo "+-----+-------+-------+------+-----------+----------+\n";
            echo sprintf(self::LICENSE_FORMAT, 'id', 'stock', 'free', 'used', 'status','duration');
            echo "+-----+-------+-------+------+-----------+----------+\n";
            echo sprintf(self::LICENSE_FORMAT, $license->id, $license->stock, $license->free, $license->used, $license->status, $license->duration);
            echo "+-----+-------+-------+------+-----------+----------+\n";
            $this->tokensByLicense($license);
        }
    }

    /**
     * @param License $license
     * @throws Exception
     */
    public function tokensByLicense(License $license)
    {
        echo sprintf("Read all token with license id '%d'",$license->id);
        $response = $this->sdk()->tokensByLicenseId($license->id);
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $licenses = new PageContainer($body);
        $this->tokens($licenses->content(Token::class));
    }

    const TOKEN_FORMAT = "| %3s | %12s | %12s | %10s |";

    /**
     * @param array $tokens
     */
    public function tokens(array $tokens)
    {
        foreach ($tokens as $token)
        {
            echo "+-----+-------+\n";

            echo "+-----+-------+\n";
            echo "+-----+-------+\n";
        }
    }

//    /**
//     *
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     */
//    public function testApps()
//    {
//        $response = $this->sdk()->apps();
//        $this->assertSame(StatusCode::OK, $response->getStatusCode());
//
//        $body = json_decode($response->getBody()->getContents());
//
//        $page = $body->_page;
//        $size = $page->size;
//
//        for ($number = $page->number + 1; $number <= $page->total_pages; $number++)
//        {
//            $response = $this->sdk()->apps($size, $number);
//            echo $response->getBody() . "\n";
//        }
//    }
//
//    /**
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     */
//    public function testHash()
//    {
//        $hash = $this->sdk()->sha(new Hash([
//            Hash::MESSAGE => 'secret',
//            Hash::ALGORITHM => HashAlgorithm::SHA512,
//        ]));
//
//    }

}
