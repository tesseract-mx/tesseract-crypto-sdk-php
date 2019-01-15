<?php namespace Tesseract\Crypto\SDK;

use phpDocumentor\Reflection\Types\Array_;

/**
 * Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Class Endpoint
 * @package App\Client
 */
final class Endpoint
{

    const API = "/api/v2/";

    const AUTH = Endpoint::API . 'auth';

    const INSTITUTION = Endpoint::API . 'institution';

    const LICENSES = Endpoint::INSTITUTION . '/licenses';

    const LICENSE = Endpoint::LICENSES . '/' . PathParam::LICENSE_ID;

    const TOKENS = Endpoint::LICENSE . '/tokens';

    const TOKEN = Endpoint::TOKENS . '/' . PathParam::TOKEN_ID;

    const APPS = Endpoint::INSTITUTION . '/apps';

    const ADMIN_INSTITUTIONS = Endpoint::API . 'institutions';

    const ADMIN_INSTITUTION = Endpoint::ADMIN_INSTITUTIONS . '/' . PathParam::INTITUTION_ID;


    /**
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
