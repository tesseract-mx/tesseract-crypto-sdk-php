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
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenseById(int $licenseId) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokensByLicenseId(int $licenseId, int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition() : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $body) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutionById(int $institutionId) : \Psr\Http\Message\ResponseInterface;
}
