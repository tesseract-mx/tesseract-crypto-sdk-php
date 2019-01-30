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
    public function licenseById(int $licenseId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokensByLicenseId(int $licenseId, int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function createTokenByLicenseId(int $licenseId, array $token) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param array $token
     * @return \Psr\Http\Message\ResponseInterface
     */
    function updateTokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, array $token) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function enrollmentStringByLicenseIdAndTokenId(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $page = 0, int $size = 20) : \Psr\Http\Message\ResponseInterface;

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
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $body) : \Psr\Http\Message\ResponseInterface;

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
    public function adminInstitutionById(int $institutionId) : \Psr\Http\Message\ResponseInterface;
}
