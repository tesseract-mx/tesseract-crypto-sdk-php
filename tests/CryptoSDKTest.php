<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\Config\Config;
use Tesseract\Crypto\SDK\Config\HttpClientConfig;

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
    public function sdk() : \Tesseract\Crypto\SDK\HttpClient
    {
        return $this->sdk;
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

//    /**
//     *
//     */
//    public function testLicenses()
//    {
//        try {
//            $response = $this->sdk()->licenses();
//            $this->assertSame(StatusCode::OK, $response->getStatusCode());
//            echo $response->getBody() . "\n";
//        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
//            echo $e->getMessage() . "\n";
//        }
//    }
//
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
