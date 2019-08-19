<?php namespace Tesseract\Crypto\SDK;

/**
 * Interface AdminOrganizationResource
 * @package Tesseract\Crypto\SDK
 */
interface AdminOrganizationResource extends OrganizationResource
{
    /**
     * @param int $page
     * @param int $size
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $page = 0, int $size = 20, string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitution(int $institutionId,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param array $institution
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateInstitution(array $institution,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param array $institution
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutInstitution(int $institutionId, array $institution,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteInstitution(int $institutionId,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $page
     * @param int $size
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicenses(int $institutionId, int $page = 0, int $size = 20,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param array $license
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateLicense(int $institutionId, array $license,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicense(int $institutionId, int $licenseId,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param array $license
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutLicense(int $institutionId, int $licenseId, array $license,string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteLicense(int $institutionId, int $licenseId, string $accessKey, string $secretAccess) : \Psr\Http\Message\ResponseInterface;
}