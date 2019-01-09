<?php namespace Tesseract\Crypto\SDK;

/**
 * Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class Config
 * @package App\Client
 */
interface IConfig
{
    /**
     *
     */
    const BASE_URL = 'tesseract.api.baseUrl';

    /**
     *
     */
    const ACCESS_KEY_ID = 'tesseract.api.access_key_id';

    /**
     *
     */
    const SECRET_ACCESS_KEY = 'tesseract.api.secret_access_key';

    /**
     *
     */
    const DEBUG = 'tesseract.api.debug';

    /**
     *
     */
    const TIMEOUT = 'tesseract.api.timeout';

    /**
     * @return string
     */
    function getBaseUrl() : string;

    /**
     * @return string
     */
    function getAccessKeyId() : string;

    /**
     * @return string
     */
    function getSecretAccessKey() : string;

    /**
     * @return array
     */
    function getAuth() : array;

    /**
     * @return bool
     */
    function isDebug() : bool ;

    /**
     * @return float
     */
    function getTimeout() : float;

}