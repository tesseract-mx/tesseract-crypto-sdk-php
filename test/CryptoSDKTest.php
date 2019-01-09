<?php

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\ConfigBase;
use Tesseract\Crypto\SDK\CryptoSDK;

/**
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
            $auth = $this->sdk()->auth();

            print_r($auth->getBody());
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            echo $e->getMessage() . "\n";
        }

    }

}
