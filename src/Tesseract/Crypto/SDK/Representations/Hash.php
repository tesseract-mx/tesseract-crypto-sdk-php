<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class Hash
 * @package Tesseract\Crypto\SDK\Representations
 */
class Hash extends Representation
{

    /**
     *
     */
    const MESSAGE = "message";

    /**
     *
     */
    const ALGORITHM = "algorithm";

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            Hash::MESSAGE => Hash::MESSAGE,
            Hash::ALGORITHM => Hash::ALGORITHM
        ];
    }

}
