<?php namespace Tesseract\Crypto\SDK;


use Tesseract\Crypto\SDK\Http\PathParam;
use Tesseract\Crypto\SDK\Http\QueryParam;
use Tesseract\Crypto\SDK\Http\URI;
use Tesseract\Crypto\SDK\Http\UriBuilder;

trait AdminOrganizationTrait //extends OrganizationResourceTrait implements AdminOrganizationResource
{

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
    public function adminInstitution(int $institutionId): \Psr\Http\Message\ResponseInterface
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

    /**
     * @param int $institutionId
     * @param array $institution
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutInstitution(int $institutionId, array $institution): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->put($uri, $institution);
    }

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteInstitution(int $institutionId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->delete($uri);
    }

    /**
     * @param int $institutionId
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicenses(int $institutionId, int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();
        return $this->get($uri);
    }

    /**
     * @param int $institutionId
     * @param array $license
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateLicense(int $institutionId, array $license): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();
        return $this->post($uri, $license);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicense(int $institutionId, int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();

        return $this->get($uri);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param array $license
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutLicense(int $institutionId, int $licenseId, array $license): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSE))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->put($uri, $license);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteLicense(int $institutionId, int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSE))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->delete($uri);
    }
}