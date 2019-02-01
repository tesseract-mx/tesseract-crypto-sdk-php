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