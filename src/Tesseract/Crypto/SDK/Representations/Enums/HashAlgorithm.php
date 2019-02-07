<?php namespace Tesseract\Crypto\SDK\Representations\Enums;

/**
 * Class HashAlgorithm
 * @package Tesseract\Crypto\SDK\Representations
 */
class HashAlgorithm
{

    /**
     * Message-Digest Algorithm 2, Algoritmo de Resumen del Mensaje
     *
     */
    const MD2 = "MD2";

    /**
     * Message-Digest Algorithm 5, Algoritmo de Resumen del Mensaje
     *
     */
    const MD5 = "MD5";

    /**
     * Secure Hash Algorithm 1
     *
     */
    const SHA = "SHA";

    /**
     * Secure Hash Algorithm 224
     *
     */
    const SHA224 = "SHA224";

    /**
     * Secure Hash Algorithm 256
     *
     */
    const SHA256 = "SHA256";

    /**
     * Secure Hash Algorithm 384
     *
     */
    const SHA384 = "SHA384";

    /**
     * Secure Hash Algorithm 512
     *
     */
    const SHA512 = "SHA512";

    /**
     *
     * All hash algorithms
     */
    const ALGORITHMS = [
        HashAlgorithm::MD2,
        HashAlgorithm::MD5,
        HashAlgorithm::SHA,
        HashAlgorithm::SHA224,
        HashAlgorithm::SHA256,
        HashAlgorithm::SHA384,
        HashAlgorithm::SHA512,
    ];

    /**
     * @param string $algorithm
     * @return string
     */
    public static function validAlgorithm(string $algorithm) : string
    {
        return in_array($algorithm, HashAlgorithm::ALGORITHMS) ? $algorithm : HashAlgorithm::SHA256;
    }

}
