<?php namespace Tesseract\Crypto\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use http\Env\Request;
use phpDocumentor\Reflection\Types\Null_;
use Tesseract\Crypto\SDK\Representations\Hash;

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
            Header::CONTENT_TYPE => MediaType::APPLICATION_JSON,
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
    public function institution() : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::INSTITUTION);
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenses(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::LICENSES);
    }

    /**
     * @param int $licenseId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function licenseById(int $licenseId) : \Psr\Http\Message\ResponseInterface
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
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokensByLicenseId(int $licenseId, int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface
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
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function tokenByLicenseIdAndTokenId(int $licenseId, int $tokenId, int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface
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
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutions(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::GET, Endpoint::ADMIN_INSTITUTIONS);
    }

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function adminInstitutionById(int $institutionId) : \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::ADMIN_INSTITUTION, [
            PathParam::INTITUTION_ID => $institutionId
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apps(int $size = 20, int $page = 0) : \Psr\Http\Message\ResponseInterface
    {
        $endpoint = Endpoint::replace(Endpoint::APPS, [
            QueryParam::SIZE => $size,
            QueryParam::PAGE => $page
        ]);

        return $this->httpClient->request(Method::GET, $endpoint);
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function hash(array $body) : \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->request(Method::POST, Endpoint::HASH, [
            RequestOptions::BODY => json_encode($body)
        ]);
    }

    /**
     * @param Hash $has
     * @return Hash
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sha(Hash $has) : Hash
    {
        $response = $this->hash($has->toArray());

        if(is_success($response->getStatusCode()))
        {
           return new Hash(to_array($response->getBody()));
        }

        return null;
    }

}
