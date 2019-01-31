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
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function roles(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ROLES))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $roleId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function role(int $roleId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ROLES))
            ->addPathParam(PathParam::ROLE_ID, $roleId)
            ->build();

        return $this->get($uri);
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
    public function license(int $licenseId): \Psr\Http\Message\ResponseInterface
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
    public function tokens(int $licenseId, int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
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
    public function createToken(int $licenseId, array $token) : \Psr\Http\Message\ResponseInterface
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
    public function token(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
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
    public function putToken(int $licenseId, int $tokenId, array $token) : \Psr\Http\Message\ResponseInterface
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
    public function deleteToken(int $licenseId, int $tokenId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->delete($uri);
    }


    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentString(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ENROLLMENT_STRING))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function actCode(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ACT_CODE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function challenge(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::CHALLENGE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $validate
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function validate(int $licenseId, int $tokenId, array $validate) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::VALIDATE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->post($uri, $validate);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APPS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function app(int $appId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createApp(array $app): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::APPS, $app);
    }

    /**
     * @param int $appId
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putApp(int $appId, array $app): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->put($uri, $app);
    }

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteApp(int $appId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->delete($uri);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition(): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::PARTITION);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::KEYS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param array $hash
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $hash): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::HASH, $hash);
    }

    /**
     * @param string $alias
     * @param $aes
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function aes(string $alias, $aes) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::AES))
            ->addPathParam(PathParam::AES_ALIAS, $alias)
            ->build();
        return $this->post($uri, $aes);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTIONS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutionById(int $institutionId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param array $institution
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateInstitution(array $institution): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::ADMIN_INSTITUTIONS, $institution);
    }

}
