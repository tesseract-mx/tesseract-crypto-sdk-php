<?php namespace Tesseract\Crypto\SDK;

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Tesseract\Crypto\SDK\Config\ClientOptions;
use Tesseract\Crypto\SDK\Http\Endpoint;
use Tesseract\Crypto\SDK\Http\Header;
use Tesseract\Crypto\SDK\Http\MediaType;

/**
 * @autor Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class CryptoHttpClient
 * @package Tesseract\Crypto\SDK
 */
abstract class CryptoHttpClient implements HttpClient
{

    /**
     * @var \Tesseract\Crypto\SDK\Config\Config
     */
    private $config;

    /**
     * @var array
     */
    private $headers = array(
        Header::ACCEPT => MediaType::APPLICATION_JSON,
        Header::CONTENT_TYPE => MediaType::APPLICATION_JSON
    );

    /**
     *
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * CryptoHttpClient constructor.
     * @param Config $config
     * @param array $headers
     */
    public function __construct(Config $config, array $headers = array())
    {
        $this->config = $config;
        $this->headers = array_merge($this->headers, $headers);

        $this->httpClient = new Client([
            ClientOptions::BASE_URI => $this->config->getBaseUrl(),
            RequestOptions::AUTH => $this->config->getAuth(),
            RequestOptions::DEBUG => $this->config->isDebug(),
            RequestOptions::HEADERS => $this->headers(),
            RequestOptions::TIMEOUT => $this->config->getTimeout()
        ]);

    }

    /**
     * @return array
     */
    protected function options() : array
    {
        return [
            RequestOptions::DEBUG => $this->config->isDebug(),
            RequestOptions::HEADERS => $this->headers(),
        ];
    }

    /**
     * @return array[][]
     */
    protected function headers() : array
    {
        return $this->headers;
    }

    /**
     * @param string $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    function get(string $endpoint): \Psr\Http\Message\ResponseInterface
    {
        return $this->httpClient->get($endpoint, $this->options());
    }

    /**
     * @param string $endpoint
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    function post(string $endpoint, array $body): \Psr\Http\Message\ResponseInterface
    {
        $options = array_merge([
            RequestOptions::BODY => $body
        ], $this->options());

        return $this->httpClient->post($endpoint, $options);
    }


    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function auth(): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(Endpoint::AUTH);
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    function institution(): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(Endpoint::INSTITUTION);
    }

    /**
     * @param int $size
     * @param int $page
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function licenses(int $size = 20, int $page = 0): \Psr\Http\Message\ResponseInterface
    {
        return $this->get(Endpoint::LICENSES);
    }

}
