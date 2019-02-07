<?php namespace Tesseract\Crypto\SDK\Http;

/**
 * Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class URI
 * @package App\Client
 */
final class URI
{

    const API = "/api/v2/";

    const AUTH = URI::API . 'auth';

    const ROLES = URI::API . 'roles';

    const INSTITUTION = URI::API . 'institution';

    const LICENSES = URI::INSTITUTION . '/licenses';

    const LICENSE = URI::LICENSES . '/' . PathParam::LICENSE_ID;

    const TOKENS = URI::LICENSE . '/tokens';

    const TOKEN = URI::TOKENS . '/' . PathParam::TOKEN_ID;

    const ENROLLMENT_STRING = URI::TOKEN . '/enrollment-string';

    const ACT_CODE = URI::TOKEN . '/act-code';

    const CHALLENGE = URI::TOKEN . '/challenge';

    const VALIDATE = URI::TOKEN . '/validate';

    const APPS = URI::INSTITUTION . '/apps';

    const APP = URI::APPS . '/' . PathParam::APP_ID;

    const PARTITION = URI::INSTITUTION . '/partition';

    const KEYS = URI::PARTITION . '/keys';

    const HASH = URI::INSTITUTION . '/hash';

    const AES = URI::INSTITUTION . '/aes/' . PathParam::AES_ALIAS;

    const ADMIN_INSTITUTIONS = URI::API . 'institutions';

    const ADMIN_INSTITUTION = URI::ADMIN_INSTITUTIONS . '/' . PathParam::INSTITUTION_ID;

    const ADMIN_LICENSES = URI::ADMIN_INSTITUTION . '/licenses';

    const ADMIN_LICENSE = URI::ADMIN_LICENSES . '/' . PathParam::LICENSE_ID;

    const ADMIN_TOKENS = URI::ADMIN_LICENSE . '/tokens';

    const ADMIN_TOKEN = URI::ADMIN_TOKENS . '/' . PathParam::TOKEN_ID;

    const HSM = self::API . 'hsm';

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $pathParams;

    /**
     * @var array
     */
    private $queryParams;

    /**
     * URI constructor.
     * @param string $uri
     * @param array $pathParams
     * @param array $queryParams
     */
    public function __construct(string $uri, array $pathParams = array(), array $queryParams = array())
    {
        $this->uri = $uri;
        $this->pathParams = $pathParams;
        $this->queryParams = $queryParams;
    }


    /**
     * @param array $pathParams
     */
    public function addPathParams(array $pathParams) : void
    {
        $this->pathParams = array_merge($this->pathParams, $pathParams);
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function addPathParam(string $key, $value) : void
    {
        $this->pathParams[$key] = $value;
    }

    /**
     * @param array $queryParams
     */
    public function addQueryParams(array $queryParams)
    {
        foreach($queryParams as $key => $values)
        {
            if(is_array($values))
            {
                if(isset($this->queryParams[$key]))
                    $this->queryParams[$key] = array_merge($this->queryParams[$key], $values);
                else
                    $this->queryParams[$key] = $values;
                $this->queryParams[$key] = array_unique($this->queryParams[$key]);
            }
        }
    }

    /**
     * @param string $key
     * @param mixed $value
     */
    public function addQueryParam(string $key, $value) : void
    {
        $this->queryParams[$key][] = $value;
        $this->queryParams[$key] = array_unique($this->queryParams[$key]);
    }

    /**
     * @return string
     */
    public function toUrl() : string
    {
        $uri = $this->uri;

        foreach ($this->pathParams as $param => $value)
        {
            $uri = str_replace($param, $value, $uri);
        }

        $queryPath = array();

        foreach ($this->queryParams as $key => $value)
            array_push($queryPath, $key . "=" . implode(',', $value));

        if(count($queryPath) >= 1)
            $uri .= "?" . implode("&", $queryPath);

        return $uri;
    }

    /**
     * @deprecated
     * @param string $endpoint
     * @param array $params
     * @param array $query
     * @return string
     */
    public static function replace(string $endpoint, array $params = array(), array $query = array()) : string
    {
        foreach ($params as $param => $value)
        {
            $endpoint = str_replace($param, $value, $endpoint);
        }

        $queryPath = array();

        foreach ($query as $key => $value)
            array_push($queryPath, $key . "=" . $value);

        if(count($queryPath) >= 1)
            $endpoint .= "?" . implode("&", $queryPath);

        return $endpoint;
    }

}
