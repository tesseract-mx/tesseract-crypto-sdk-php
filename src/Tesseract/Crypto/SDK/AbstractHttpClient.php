<?php
/**
 * Created by PhpStorm.
 * User: crist
 * Date: 25/01/2019
 * Time: 01:10 PM
 */

namespace Tesseract\Crypto\SDK;


use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Tesseract\Crypto\SDK\Http\Header;
use Tesseract\Crypto\SDK\Http\MediaType;
use Tesseract\Crypto\SDK\Options\ClientOptions;
use Tesseract\Crypto\SDK\Options\Config;

/**
 * Class AbstractHttpClient
 * @package Tesseract\Crypto\SDK
 */
abstract class AbstractHttpClient implements HttpClient
{
    /**
     * @var \Tesseract\Crypto\SDK\Options\Config
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

}