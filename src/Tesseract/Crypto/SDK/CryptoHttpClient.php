<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;
use Tesseract\Crypto\SDK\Http\QueryParam;

/**
 * @autor Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class CryptoHttpClient
 * @package Tesseract\Crypto\SDK
 */
abstract class CryptoHttpClient extends AbstractHttpClient
{

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function auth(): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::AUTH);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function institution(): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::INSTITUTION);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::LICENSES))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

}
