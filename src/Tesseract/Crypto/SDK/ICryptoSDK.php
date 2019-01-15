<?php namespace Tesseract\Crypto\SDK;

use Psr\Http\Message\ResponseInterface;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Interface ICryptoSDK
 * @package Tesseract\Crypto\SDK
 */
interface ICryptoSDK
{
    /**
     * @return ResponseInterface
     */
    public function auth() : ResponseInterface;

    /**
     * @return ResponseInterface
     */
    public function institution() : ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     */
    public function licenses(int $size = 20, int $page = 0) : ResponseInterface;

    /**
     * @param int $licenseId
     * @return ResponseInterface
     */
    public function licenseById(int $licenseId) : ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     */
    public function tokensByLicenseId(int $licenseId, int $size = 20, int $page = 0) : ResponseInterface;

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, int $size = 20, int $page = 0) : ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     */
    public function apps(int $size = 20, int $page = 0) : ResponseInterface;

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     */
    public function adminInstitutions(int $size = 20, int $page = 0) : ResponseInterface;

    /**
     * @param int $institutionId
     * @return ResponseInterface
     */
    public function adminInstitutionById(int $institutionId) : ResponseInterface;
}
