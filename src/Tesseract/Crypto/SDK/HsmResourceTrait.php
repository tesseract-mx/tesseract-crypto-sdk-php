<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Http\URI;

/**
 * Class HsmResourceTrait
 * @package Tesseract\Crypto\SDK
 */
trait HsmResourceTrait // extends AdminOrganizationTrait implements HsmResource
{

    /**
     * @param string $accessKey
     * @param string $secretAccess
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function hsm(string $accessKey,string $secretAccess) : \Psr\Http\Message\ResponseInterface
    {
        return $this->get(URI::HSM,$accessKey,$secretAccess);
    }

}