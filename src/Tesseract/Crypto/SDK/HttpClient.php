<?php namespace Tesseract\Crypto\SDK;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Interface HttpClient
 * @package Tesseract\Crypto\SDK
 */
interface HttpClient extends Resource
{

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function auth() : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function roles(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $roleId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function role(int $roleId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function institution() : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function license(int $licenseId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokens(int $licenseId, int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createToken(int $licenseId, array $token) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function token(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    function putToken(int $licenseId, int $tokenId, array $token) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    function deleteToken(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentString(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function actCode(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function challenge(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $validate
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function validate(int $licenseId, int $tokenId, array $validate) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function app(int $appId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createApp(array $app) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @param array $app
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function putApp(int $appId, array $app): \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $appId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function deleteApp(int $appId): \Psr\Http\Message\ResponseInterface;

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition() : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $hash
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $hash) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $alias
     * @param $aes
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function aes(string $alias, $aes) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitution(int $institutionId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $institution
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateInstitution(array $institution) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param array $institution
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutInstitution(int $institutionId, array $institution) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteInstitution(int $institutionId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicenses(int $institutionId, int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param array $license
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateLicense(int $institutionId, array $license) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicense(int $institutionId, int $licenseId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param array $license
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutLicense(int $institutionId, int $licenseId, array $license) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteLicense(int $institutionId, int $licenseId) : \Psr\Http\Message\ResponseInterface;

}
