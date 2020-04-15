<?php namespace Tesseract\Crypto\SDK;

/**
 * Interface OrganizationResource
 * @package Tesseract\Crypto\SDK
 */
interface OrganizationResource extends Resource
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function auth(string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function roles(int $page = 0, int $size = 20,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $roleId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function role(int $roleId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function institution(string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $page = 0, int $size = 20,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function license(int $licenseId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

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
    public function tokens(int $licenseId, int $page = 0, int $size = 20,string $tokenStatus = null, string $tokenType = null, string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createToken(int $licenseId, array $token,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function token(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    function putToken(int $licenseId, int $tokenId, array $token,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    function deleteToken(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentString(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function actCode(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function challenge(int $licenseId, int $tokenId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $validate
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function validate(int $licenseId, int $tokenId, array $validate,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $page = 0, int $size = 20,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function app(int $appId,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createApp(array $app,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putApp(int $appId, array $app,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteApp(int $appId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface;

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition(string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $page = 0, int $size = 20,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $hash
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $hash,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $alias
     * @param $aes
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function aes(string $alias, string $aes,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $key_id
     * @param string $access_key
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putPassword(array $password, string $accessKey, string $secretAccess ) : \Psr\Http\Message\ResponseInterface; 
}