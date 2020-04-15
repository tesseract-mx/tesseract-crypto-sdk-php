<?php namespace Tesseract\Crypto\SDK;


use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;

/**
 * Class OrganizationResourceTrait
 * @package Tesseract\Crypto\SDK
 */
trait OrganizationResourceTrait // extends AbstractHttpClient implements OrganizationResource
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function auth(string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::AUTH,$accessKey,$secretAccess);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function roles(int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ROLES))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $roleId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function role(int $roleId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ROLES))
            ->addPathParam(PathParam::ROLE_ID, $roleId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }


    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function institution(string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::INSTITUTION,$accessKey,$secretAccess);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::LICENSES))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function license(int $licenseId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::LICENSE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->get($uri,$accessKey,$secretAccess);
    }


    /**
     * @param int $licenseId
     * @param int $page
     * @param int $size
     * @param string $tokenStatus
     * @param string $tokenType
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokens(int $licenseId, int $page = 0, int $size = 20,string $tokenStatus = null, string $tokenType = null ,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        if(isset($tokenStatus) && isset($tokenType)){
            $uri = (new UriBuilder(URI::TOKENS))
                ->addPathParam(PathParam::LICENSE_ID, $licenseId)
                ->addQueryParam(QueryParam::TOKEN_STATUS,$tokenStatus)
                ->addQueryParam(QueryParam::TOKEN_TYPE,$tokenType)
                ->addQueryParam(QueryParam::PAGE, $page)
                ->addQueryParam(QueryParam::SIZE, $size)
                ->build();
        }else if(isset($tokenStatus) && !isset($tokenType)){
            $uri = (new UriBuilder(URI::TOKENS))
                ->addPathParam(PathParam::LICENSE_ID, $licenseId)
                ->addQueryParam(QueryParam::TOKEN_STATUS,$tokenStatus)
                ->addQueryParam(QueryParam::PAGE, $page)
                ->addQueryParam(QueryParam::SIZE, $size)
                ->build();
        }else if(!isset($tokenStatus) && isset($tokenType)){
            $uri = (new UriBuilder(URI::TOKENS))
                ->addPathParam(PathParam::LICENSE_ID, $licenseId)
                ->addQueryParam(QueryParam::TOKEN_TYPE,$tokenType)
                ->addQueryParam(QueryParam::PAGE, $page)
                ->addQueryParam(QueryParam::SIZE, $size)
                ->build();
        }else{
            $uri = (new UriBuilder(URI::TOKENS))
                ->addPathParam(PathParam::LICENSE_ID, $licenseId)
                ->addQueryParam(QueryParam::PAGE, $page)
                ->addQueryParam(QueryParam::SIZE, $size)
                ->build();
        }


        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createToken(int $licenseId, array $token,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKENS))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();

        return $this->post($uri, $token,$accessKey,$secretAccess);
    }


    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function token(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putToken(int $licenseId, int $tokenId, array $token,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->put($uri, $token,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteToken(int $licenseId, int $tokenId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::TOKEN))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->delete($uri,array(),$accessKey,$secretAccess);
    }


    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentString(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ENROLLMENT_STRING))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function actCode(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ACT_CODE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function challenge(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::CHALLENGE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $validate
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function validate(int $licenseId, int $tokenId, array $validate,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::VALIDATE))
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->addPathParam(PathParam::TOKEN_ID, $tokenId)
            ->build();

        return $this->post($uri, $validate,$accessKey,$secretAccess);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APPS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function app(int $appId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createApp(array $app,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::APPS, $app,$accessKey,$secretAccess);
    }

    /**
     * @param int $appId
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putApp(int $appId, array $app,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->put($uri, $app,$accessKey,$secretAccess);
    }

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteApp(int $appId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::APP))
            ->addPathParam(PathParam::APP_ID, $appId)
            ->build();

        return $this->delete($uri,array(),$accessKey,$secretAccess);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition(string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::PARTITION,$accessKey,$secretAccess);
    }

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::KEYS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param array $hash
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $hash,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::HASH, $hash,$accessKey,$secretAccess);
    }

    /**
     * @param string $alias
     * @param $aes
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function aes(string $alias, string $aes,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::AES))
            ->addPathParam(PathParam::AES_ALIAS, $alias)
            ->build();
        return $this->post($uri, $aes,$accessKey,$secretAccess);
    }

    /**
     * @param string $key_id
     * @param string $access_key
     * @return \Psr\Http\Message\ResponseInterface
     */

     public function putPassword(array $password, string $accessKey, string $secretAccess ) : \Psr\Http\Message\ResponseInterface
     {
         $uri = (new UriBuilder(URI::SECRET_ACCESS_KEY))
         ->build();
         return $this->put($uri, $password,$accessKey, $secretAccess);
     }
}
