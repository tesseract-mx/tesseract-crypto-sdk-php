<?php namespace Tesseract\Crypto\SDK;

use Tesseract\Crypto\SDK\Representations\Hash;

/**
 *
 * @author Cristian Jaramillo (cristian_gerar@hotmail.com)
 *
 * Interface ICryptoSDK
 * @package Tesseract\Crypto\SDK
 */
interface SDK
{


    /**
     * @param Hash $has
     * @return Hash
     */
    public function sha(Hash $has) : Hash;

}
