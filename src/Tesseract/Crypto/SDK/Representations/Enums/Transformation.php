<?php namespace Tesseract\Crypto\SDK\Representations\Enums;

/**
 * Class Transformation
 * @package Tesseract\Crypto\SDK\Representations
 */
final class Transformation
{

    /**
     *
     * AES Encryption in CBC Mode (Cipher Block Chaining mode) No Padding
     */
    const AES_CBC_NoPadding = "AES_CBC_NoPadding";

    /**
     *
     * AES Encryption in CBC Mode (Cipher Block Chaining mode) ISO 10126 Padding
     */
    const AES_CBC_ISO10126Padding = "AES_CBC_ISO10126Padding";

    /**
     *
     * AES Encryption in CBC Mode (Cipher Block Chaining mode) PKCS5 Padding
     */
    const AES_CBC_PKCS5Padding = "AES_CBC_PKCS5Padding";

    /**
     *
     * AES Encryption in CFB8 Mode (Cipher Feedback 8 mode) No Padding
     */
    const AES_CFB8_NoPadding = "AES_CFB8_NoPadding";

    /**
     *
     * AES Encryption in CFB128 Mode (Cipher Feedback 128 mode) No Padding
     */
    const AES_CFB128_NoPadding = "AES_CFB128_NoPadding";

    /**
     *
     * AES Encryption in CTR Mode (Cipher Counter mode) No Padding
     */
    const AES_CTR_NoPadding = "AES_CTR_NoPadding";

    /**
     *
     * AES Encryption in ECB Mode (Cipher Electronic Codebook mode) No Padding
     */
    const AES_ECB_NoPadding = "AES_ECB_NoPadding";

    /**
     *
     * AES Encryption in GCM Mode (Cipher Galois/Counter mode) No Padding
     */
    const AES_GCM_NoPadding = "AES_GCM_NoPadding";

    /**
     *
     * AES Encryption in OFB Mode (Cipher Output Feedback mode) No Padding
     */
    const AES_OFB_NoPadding = "AES_OFB_NoPadding";

    /**
     *
     */
    const TRANSFORMATIONS = [
        self::AES_CBC_ISO10126Padding,
        self::AES_CBC_NoPadding,
        self::AES_CBC_PKCS5Padding,
        self::AES_CFB8_NoPadding,
        self::AES_CFB128_NoPadding,
        self::AES_CTR_NoPadding,
        self::AES_ECB_NoPadding,
        self::AES_GCM_NoPadding,
        self::AES_OFB_NoPadding
    ];

}
