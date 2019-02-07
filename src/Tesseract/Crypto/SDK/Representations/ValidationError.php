<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class ValidationError
 * @package Tesseract\Crypto\SDK\Representations
 */
class ValidationError extends Representation
{

    /**
     *
     */
    const FIELD_ERRORS = "fieldErrors";

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            ValidationError::FIELD_ERRORS
        ];
    }

}
