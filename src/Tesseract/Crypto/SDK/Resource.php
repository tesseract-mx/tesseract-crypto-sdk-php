<?php namespace Tesseract\Crypto\SDK;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 * @author Mijail Vázquez (isaac.sumuano@tesseract.mx)
 * Interface Resource
 * @package Tesseract\Crypto\SDK
 */
interface Resource
{

    /**
     * @param string $endpoint
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    function get(string $endpoint,string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $body
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    function post(string $endpoint, array $body = array(),string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $body
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    function put(string $endpoint, array $body = array(),string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $body
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    function delete(string $endpoint, array $body = array(),string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;

}