<?php namespace Tesseract\Crypto\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

/**
 * Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class CryptoSDK
 * @package Tesseract\Crypto\SDK
 */
class CryptoSDK
{
    /**
     * @var
     */
    private $httpClient;

    /**
     * @var
     */
    private $config;

    /**
     * CryptoSDK constructor.
     * @param IConfig $config
     */
    function __construct(IConfig $config)
    {
        $this->config = $config;

        $headers = [
            Header::ACCEPT => MediaType::APPLICATION_JSON,
        ];

        $this->httpClient = new Client([
            ClientOptions::BASE_URI => $this->config->getBaseUrl(),
            RequestOptions::AUTH => $this->config->getAuth(),
            RequestOptions::DEBUG => $this->config->isDebug(),
            RequestOptions::HEADERS => $headers,
            RequestOptions::TIMEOUT => $this->config->getTimeout(),
        ]);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auth() : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::AUTH);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function institution(): \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::INSTITUTION);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenses(): \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::LICENSES);
    }

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenseById(int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS, [
            PathParam::LICENSE_ID => $licenseId
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokensByLicenseId(int $licenseId): \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS, [
            PathParam::LICENSE_ID => $licenseId,
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId) : \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS, [
            PathParam::LICENSE_ID => $licenseId,
            PathParam::TOKEN_ID => $tokenId,
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutions() : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::ADMIN_INSTITUTIONS);
    }

    /**
     * @param int $institutionId
     * @return mixed|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutionById(int $institutionId) : \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::ADMIN_INSTITUTION, [
            PathParam::INTITUTION_ID => $institutionId
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

}