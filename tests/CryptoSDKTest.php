<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\ConfigBase;
use Tesseract\Crypto\SDK\CryptoSDK;
use Tesseract\Crypto\SDK\IConfig;
use Tesseract\Crypto\SDK\Representations\Hash;
use Tesseract\Crypto\SDK\Representations\HashAlgorithm;

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

        $config = new ConfigBase($configs[IConfig::BASE_URL], $configs[IConfig::ACCESS_KEY_ID], $configs[IConfig::SECRET_ACCESS_KEY]);
        $this->sdk = new CryptoSDK($config);
    }

    /**
     * @return CryptoSDK
     */
    public function sdk() : CryptoSDK
    {
        return $this->sdk;
    }

    /**
     *
     */
    public function testAuth()
    {
        try {
            $response = $this->sdk()->auth();
            echo $response->getBody() . "\n";
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     *
     */
    public function testInstitution()
    {
        try {
            $response = $this->sdk()->institution();
            echo $response->getBody() . "\n";
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     *
     */
    public function testLicenses()
    {
        try {
            $response = $this->sdk()->licenses();
            echo $response->getBody() . "\n";
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage() . "\n";
        }
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testTokens()
    {
        $response = $this->sdk()->licenses();

        $body = json_decode($response->getBody()->getContents());

        $size = 20;
        $page = 0;

        foreach ($body->_content as $license)
        {
            $response = $this->sdk()->tokensByLicenseId($license->id, $size, $page);
            $tokens = json_decode($response->getBody()->getContents());
            $totalPages = $tokens->_page->total_pages;

            for ($page = 0; $page < $totalPages; $page++)
            {
                $response = $this->sdk()->tokensByLicenseId($license->id, $size, $page);
                echo $response->getBody() . "\n";
            }

        }
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testApps()
    {
       $response = $this->sdk()->apps();

       $body = json_decode($response->getBody()->getContents());

       $page = $body->_page;
       $size = $page->size;

       for ($number = $page->number + 1; $number <= $page->total_pages; $number++)
        {
            $response = $this->sdk()->apps($size, $number);
            echo $response->getBody() . "\n";
        }
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testHash()
    {
        $hash = $this->sdk()->sha(new Hash([
            Hash::MESSAGE => 'secret',
            Hash::ALGORITHM => HashAlgorithm::SHA512,
        ]));


    }

}
