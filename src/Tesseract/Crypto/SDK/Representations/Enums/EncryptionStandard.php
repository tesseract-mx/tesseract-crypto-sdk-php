<?php namespace Tesseract\Crypto\SDK\Representations\Enums;

/**
 * Class EncryptionStandard
 * @package Tesseract\Crypto\SDK\Representations
 */
final class EncryptionStandard
{

    const AES_128 = 'AES_128';
    const AES_192 = 'AES_192';
    const AES_256 = 'AES_256';
    const RSA_1024 = 'RSA_1024';
    const RSA_2048 = 'RSA_2048';
    const RSA_4096 = 'RSA_4096';

    /**
     * @return array
     */
    public function symmetric() : array
    {
        return [
            self::AES_128,
            self::AES_192,
            self::AES_256
        ];
    }

    /**
     * @return array
     */
    public function asymmetric() : array
    {
        return [
            self::RSA_1024,
            self::RSA_2048,
            self::RSA_4096
        ];
    }

}