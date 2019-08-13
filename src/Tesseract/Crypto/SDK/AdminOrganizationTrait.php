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
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTIONS))
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitution(int $institutionId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param array $institution
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateInstitution(array $institution,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        return $this->post(URI::ADMIN_INSTITUTIONS, $institution,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param array $institution
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutInstitution(int $institutionId, array $institution,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->put($uri, $institution,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteInstitution(int $institutionId, string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_INSTITUTION))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();

        return $this->delete($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param int $page
     * @param int $size
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicenses(int $institutionId, int $page = 0, int $size = 20,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addQueryParam(QueryParam::PAGE, $page)
            ->addQueryParam(QueryParam::SIZE, $size)
            ->build();
        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param array $license
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminCreateLicense(int $institutionId, array $license,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->build();
        return $this->post($uri, $license,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminLicense(int $institutionId, int $licenseId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSES))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();

        return $this->get($uri,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param array $license
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminPutLicense(int $institutionId, int $licenseId, array $license,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSE))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->put($uri, $license,$accessKey,$secretAccess);
    }

    /**
     * @param int $institutionId
     * @param int $licenseId
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminDeleteLicense(int $institutionId, int $licenseId,string $accessKey,string $secretAccess): \Psr\Http\Message\ResponseInterface
    {
        $uri = (new UriBuilder(URI::ADMIN_LICENSE))
            ->addPathParam(PathParam::INSTITUTION_ID, $institutionId)
            ->addPathParam(PathParam::LICENSE_ID, $licenseId)
            ->build();
        return $this->delete($uri,$accessKey,$secretAccess);
    }
}