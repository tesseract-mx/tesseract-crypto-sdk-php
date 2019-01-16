<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class FieldError
 * @package Tesseract\Crypto\SDK\Representations
 */
class FieldError extends Representation
{

    /**
     *
     */
    const FIELD = "field";

    /**
     *
     */
    const MESSAGE = "message";

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            FieldError::FIELD,
            FieldError::MESSAGE,
        ];
    }

}
