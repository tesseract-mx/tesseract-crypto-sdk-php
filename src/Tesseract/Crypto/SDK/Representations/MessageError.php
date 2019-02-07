<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class MessageError
 * @package Tesseract\Crypto\SDK\Representations
 */
final class MessageError extends Representation
{

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            'status' => 'status',
            'message' => 'message',
            'developerMessage' => 'developerMessage',
        ];
    }

}