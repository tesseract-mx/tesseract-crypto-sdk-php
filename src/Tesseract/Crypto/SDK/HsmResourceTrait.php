<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Http\URI;

/**
 * Class HsmResourceTrait
 * @package Tesseract\Crypto\SDK
 */
trait HsmResourceTrait // extends AdminOrganizationTrait implements HsmResource
{

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hsm() : \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::HSM);
    }

}