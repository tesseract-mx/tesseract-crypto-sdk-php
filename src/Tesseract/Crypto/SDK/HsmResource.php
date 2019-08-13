<?php namespace Tesseract\Crypto\SDK;

/**
 * Interface HsmResource
 * @package Tesseract\Crypto\SDK
 */
interface HsmResource extends AdminOrganizationResource
{
    /**
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hsm(string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface;
}