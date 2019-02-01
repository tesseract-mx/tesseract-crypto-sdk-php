<?php namespace Tesseract\Crypto\SDK;

/**
 * Interface HsmResource
 * @package Tesseract\Crypto\SDK
 */
interface HsmResource extends AdminOrganizationResource
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hsm() : \Psr\Http\Message\ResponseInterface;
}