<?php namespace Tesseract\Crypto\SDK;

/**
 * Class CryptoSDK
 * @package Tesseract\Crypto\SDK
 */
class CryptoSDK extends AbstractHttpClient implements HsmRestResource
{
    use OrganizationResourceTrait;
    use AdminOrganizationTrait;
    use HsmResourceTrait;
    use HsmRestResourceTrait;
}
