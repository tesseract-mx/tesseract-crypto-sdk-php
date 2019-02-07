<?php namespace Tesseract\Crypto\SDK\Representations;


/**
 * Class License
 * @package Tesseract\Crypto\SDK\Representations
 */
class License extends Representation
{

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            'id' => 'id',
            'stock' => 'stock',
            'free' => 'free',
            'used' => 'used',
            'status' => 'status',
            'duration' => 'duration',
            'activated_at' => 'activated_at',
            'expired_at' => 'expired_at',
            'created_at' => 'created_at',
            'updated_at' => 'updated_at'
        ];
    }
}