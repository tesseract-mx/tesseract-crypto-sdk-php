<?php namespace Tesseract\Crypto\SDK\Test;

use PHPUnit\Framework\TestCase;
use Tesseract\Crypto\SDK\CryptoSDK;
use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\StatusCode;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;
use Tesseract\Crypto\SDK\Options\Config;
use Tesseract\Crypto\SDK\Options\HttpClientConfig;
use Tesseract\Crypto\SDK\Representations\Enums\TokenStatus;
use Tesseract\Crypto\SDK\Representations\Enums\TokenType;
use Tesseract\Crypto\SDK\Representations\HATEOAS\Paged;
use function Tesseract\Crypto\SDK\to_array;

/**
 *
 * Class ResourceTest
 */
class ResourceTest extends TestCase
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
     * @var \Tesseract\Crypto\SDK\HsmRestResource
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
     * @throws \Exception
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

}
