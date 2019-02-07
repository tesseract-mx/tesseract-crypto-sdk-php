<?php namespace Tesseract\Crypto\SDK\Options;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Interface Config
 * @package Tesseract\Crypto\SDK\Options
 */
interface Config
{
    /**
     *
     */
    const BASE_URL = 'tesseract.crypto.baseUrl';

    /**
     *
     */
    const ACCESS_KEY_ID = 'tesseract.crypto.access_key_id';

    /**
     *
     */
    const SECRET_ACCESS_KEY = 'tesseract.crypto.secret_access_key';

    /**
     *
     */
    const DEBUG = 'tesseract.crypto.debug';

    /**
     *
     */
    const TIMEOUT = 'tesseract.crypto.timeout';

    /**
     *
     * @return string
     */
    function getBaseUrl() : string;

    /**
     * @deprecated
     * @return string
     */
    function getAccessKeyId() : string;

    /**
     *
     * @deprecated
     * @return string
     */
    function getSecretAccessKey() : string;

    /**
     *
     * @return array
     */
    function getAuth() : array;

    /**
     *
     * @return bool
     */
    function isDebug() : bool ;

    /**
     *
     * @return float
     */
    function getTimeout() : float;

}
