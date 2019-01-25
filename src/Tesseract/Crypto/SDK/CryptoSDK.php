<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Representations\Hash;

/**
 * Class CryptoSDK
 * @package Tesseract\Crypto\SDK
 */
class CryptoSDK extends CryptoHttpClient implements SDK
{

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenseById(int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement licenseById() method.
    }

    /**
     * @param int $licenseId
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokensByLicenseId(int $licenseId, int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement tokensByLicenseId() method.
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement tokenByLicenseIdAndTokenId() method.
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function apps(int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement apps() method.
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function partition(): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement partition() method.
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function keys(int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement keys() method.
    }

    /**
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hash(array $body): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement hash() method.
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement adminInstitutions() method.
    }

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutionById(int $institutionId): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement adminInstitutionById() method.
    }

    /**
     * @param Hash $has
     * @return Hash
     */
    public function sha(Hash $has): Hash
    {
        // TODO: Implement sha() method.
    }
}
