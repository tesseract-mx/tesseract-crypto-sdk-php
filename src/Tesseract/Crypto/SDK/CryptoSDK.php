<?php namespace Tesseract\Crypto\SDK;

/**
 * Class CryptoSDK
 * @package Tesseract\Crypto\SDK
 */
class CryptoSDK extends CryptoHttpClient implements SDK
{

    /**
     * @param int $page
     * @param int $size
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutions(int $page = 0, int $size = 20): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement adminInstitutions() method.
    }

    /**
     * @param int $institutionId
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function adminInstitutionById(int $institutionId): \Psr\Http\Message\ResponseInterface
    {
        // TODO: Implement adminInstitutionById() method.
    }

}
