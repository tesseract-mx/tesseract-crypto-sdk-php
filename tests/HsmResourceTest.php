<?php namespace Tesseract\Crypto\SDK\Test;

require __DIR__ . '/ResourceTest.php';

use Tesseract\Crypto\SDK\Http\StatusCode;
use function Tesseract\Crypto\SDK\to_array;

/**
 * Class HsmResourceTest
 */
final class HsmResourceTest extends ResourceTest
{

    /**
     * @throws \Exception
     */
    public function testHsm() : void
    {
        $response = $this->sdk->hsm();
        $this->assertEquals(StatusCode::OK, $response->getStatusCode());
    }

}