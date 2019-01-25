<?php namespace Tesseract\Crypto\SDK\Options;

/**
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class HttpClientConfig
 * @package Tesseract\Crypto\SDK\Options
 */
class HttpClientConfig implements Config
{
    /**
     * @var
     */
    private $baseUrl;

    /**
     * @var
     */
    private $accessKeyId;

    /**
     * @var
     */
    private $secretAccessKey;

    /**
     * @var
     */
    private $debug;

    /**
     * @var
     */
    private $timeout;

    /**
     * ConfigBase constructor.
     * @param $baseUrl
     * @param $accessKeyId
     * @param $secretAccessKey
     * @param bool $debug
     * @param float $timeout
     */
    public function __construct($baseUrl, $accessKeyId, $secretAccessKey, $debug = false, $timeout = 5.000)
    {
        $this->baseUrl = $baseUrl;
        $this->accessKeyId = $accessKeyId;
        $this->secretAccessKey = $secretAccessKey;
        $this->debug = $debug;
        $this->timeout = $timeout;
    }


    /**
     * @return string
     */
    function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @deprecated
     * @return string
     */
    function getAccessKeyId(): string
    {
        return $this->accessKeyId;
    }

    /**
     * @deprecated
     * @return string
     */
    function getSecretAccessKey(): string
    {
        return $this->secretAccessKey;
    }

    /**
     * @return array
     */
    function getAuth(): array
    {
        return [
            $this->getAccessKeyId(),
            $this->getSecretAccessKey()
        ];
    }

    /**
     * @return bool
     */
    function isDebug(): bool
    {
        return $this->debug;
    }

    /**
     * @return float
     */
    function getTimeout(): float
    {
        return $this->timeout;
    }
}
