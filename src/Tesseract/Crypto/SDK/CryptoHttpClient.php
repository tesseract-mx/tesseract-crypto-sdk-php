<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Http\PathParam;
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

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenseById(int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::LICENSE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->get($uri);
    }


    /**
     * @param int $licenseId
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokensByLicenseId(int $licenseId, int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKENS))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addPathParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $licenseId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createTokenByLicenseId(int $licenseId, array $token) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKENS))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();

        return $this->post($uri, $token);
    }


    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function updateTokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, array $token) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->put($uri, $token);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentStringByLicenseIdAndTokenId(int $licenseId, int $tokenId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ENROLLMENT_STRING))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri);
    }


}
