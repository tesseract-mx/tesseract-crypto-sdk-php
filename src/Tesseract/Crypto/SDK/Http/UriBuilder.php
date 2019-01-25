<?php namespace Tesseract\Crypto\SDK\Http;

/**
 * Class UriBuilder
 * @package Tesseract\Crypto\SDK\Http
 */
class UriBuilder implements Builder
{

    /**
     * @var \Tesseract\Crypto\SDK\Http\URI
     */
    private $uri;

    /**
     * UriBuilder constructor.
     * @param string $endpoint
     */
    public function __construct(string $endpoint)
    {
        $this->uri = new URI($endpoint);
        return $this->uri;
    }

    /**
     * @param string $key
     * @param $value
     * @return UriBuilder
     */
    public function addPathParam(string $key, $value) : UriBuilder
    {
        $this->uri->addPathParam($key, $value);
        return $this;
    }

    /**
     * @param array $pathParams
     * @return UriBuilder
     */
    public function addPathParams(array $pathParams) : UriBuilder
    {
        $this->uri->addPathParams($pathParams);
        return $this;
    }

    /**
     * @param string $key
     * @param $value
     * @return UriBuilder
     */
    public function addQueryParam(string $key, $value) : UriBuilder
    {
        $this->uri->addQueryParam($key, $value);
        return $this;
    }

    /**
     * @param array $queryParams
     * @return UriBuilder
     */
    public function addQueryParams(array $queryParams) : UriBuilder
    {
        $this->uri->addQueryParams($queryParams);
        return $this;
    }

    /**
     * @return mixed|string
     */
    function build()
    {
        return $this->uri->toUrl();
    }

}