<?php

declare(strict_types = 1);

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\ConfigBase;
use Tesseract\Crypto\SDK\CryptoSDK;

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
        $config = new ConfigBase('https://sandbox.tesseract.mx', 'wEoKY5m0Xi1eNVnvwyXg', 'GBV1PZEmKbxVuOXbf3EOg8vOfNBBs10PwBwCzDwQ');
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
     */
    public function testTokens()
    {
        try {

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

        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage() . "\n";
        }
    }

}
