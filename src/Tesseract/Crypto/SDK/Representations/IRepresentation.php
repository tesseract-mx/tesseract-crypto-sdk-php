<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class IRepresentation
 * @package Tesseract\Crypto\SDK\Representations
 */
interface IRepresentation
{

    /**
     * @return array
     */
    public function getProperties() : array;

    /**
     * @return array
     */
    public function toArray() : array;

}
