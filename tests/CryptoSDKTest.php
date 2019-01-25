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
use Tesseract\Crypto\SDK\Representations\HATEOAS\PageContainer;
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
     * @var
     */
    private $sdk;

    /**
     *
     */
    public function setUp()
    {
        $configs = include('config.php');
        $configs = $configs[$configs['connection']];
        $config = new HttpClientConfig($configs[Config::BASE_URL], $configs[Config::ACCESS_KEY_ID], $configs[Config::SECRET_ACCESS_KEY]);
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
    public function testAuth()
    {
        $response = $this->sdk()->auth();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     *
     * @throws Exception
     */
    public function testInstitution()
    {
        $response = $this->sdk()->institution();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
    }

    /**
     * @throws Exception
     */
    public function testReadAllLicenses()
    {
        $response = $this->sdk()->licenses();
        $this->assertSame(StatusCode::OK, $response->getStatusCode());
        $body = to_array($response->getBody());
        $container = new PageContainer($body);
        $number = $container->page()->number + 1;
        $totalPages = $container->page()->total_pages;

        for ($i = $number; $i < $totalPages; $i++)
        {
            $response = $this->sdk()->licenses($i);
            $this->assertSame(StatusCode::OK, $response->getStatusCode());
        }
    }

//    /**
//     *
//     * @throws \GuzzleHttp\Exception\GuzzleException
//     */
//    public function testTokens()
//    {
//        $response = $this->sdk()->licenses();
//        $this->assertSame(StatusCode::OK, $response->getStatusCode());
//        $body = json_decode($response->getBody()->getContents());
//
//        $size = 20;
//        $page = 0;
//
//        foreach ($body->_content as $license)
//        {
//            $response = $this->sdk()->tokensByLicenseId($license->id, $size, $page);
//            $this->assertSame(StatusCode::OK, $response->getStatusCode());
//            $tokens = json_decode($response->getBody()->getContents());
//            $totalPages = $tokens->_page->total_pages;
//
//            for ($page = 0; $page < $totalPages; $page++)
//            {
//                $response = $this->sdk()->tokensByLicenseId($license->id, $size, $page);
//                $this->assertSame(StatusCode::OK, $response->getStatusCode());
//                echo $response->getBody() . "\n";
//            }
//
//        }
//    }
//
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
