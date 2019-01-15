<?php namespace Tesseract\Crypto\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

/**
 * Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class CryptoSDK
 * @package Tesseract\Crypto\SDK
 */
class CryptoSDK implements ICryptoSDK
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
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function auth() : ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::AUTH);
    }

    /**
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function institution() : ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::INSTITUTION);
    }

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenses(int $size = 20, int $page = 0) : ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::LICENSES);
    }

    /**
     * @param int $licenseId
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenseById(int $licenseId) : ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS, [
            PathParam::LICENSE_ID => $licenseId
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $licenseId
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokensByLicenseId(int $licenseId, int $size = 20, int $page = 0) : ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS,
            [
                PathParam::LICENSE_ID => $licenseId,
            ],
            [
                QueryParam::SIZE => $size,
                QueryParam::PAGE => $page
            ]
        );



        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $licenseId
     * @param int $tokenId
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, int $size = 20, int $page = 0) : ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::TOKENS,
            [
                PathParam::LICENSE_ID => $licenseId,
                PathParam::TOKEN_ID => $tokenId,
            ],
            [
                QueryParam::SIZE => $size,
                QueryParam::PAGE => $page
            ]
        );

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutions(int $size = 20, int $page = 0) : ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::ADMIN_INSTITUTIONS);
    }

    /**
     * @param int $institutionId
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutionById(int $institutionId) : ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::ADMIN_INSTITUTION, [
            PathParam::INTITUTION_ID => $institutionId
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $size
     * @param int $page
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apps(int $size = 20, int $page = 0): ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::APPS, [
            QueryParam::SIZE => $size,
            QueryParam::PAGE => $page
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

}
