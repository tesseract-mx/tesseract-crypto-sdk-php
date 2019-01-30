<?php namespace Tesseract\Crypto\SDK;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Interface Resource
 * @package Tesseract\Crypto\SDK
 */
interface Resource
{

    /**
     * @param string $endpoint
     * @return \Psr\Http\Message\ResponseInterface
     */
    function get(string $endpoint) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    function post(string $endpoint, array $body) : \Psr\Http\Message\ResponseInterface;

    /**
     * @param string $endpoint
     * @param array $body
     * @return \Psr\Http\Message\ResponseInterface
     */
    function put(string $endpoint, array $body) : \Psr\Http\Message\ResponseInterface;

}
