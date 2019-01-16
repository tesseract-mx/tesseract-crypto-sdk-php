<?php namespace Tesseract\Crypto\SDK\Representations;

/**
 * Class Representation
 * @package Tesseract\Crypto\SDK\Representations
 */
abstract class Representation implements IRepresentation
{

    /**
     * @var array
     */
    private $body = array();

    /**
     * Representation constructor.
     * @param array $body
     */
    public function __construct(array $body)
    {
        foreach ($body as $key => $value)
        {
            if(in_array($key, $this->getProperties()))
                $this->body[$key] = $value;
        }
    }

    /**
     * @param $propertyName
     * @return null
     */
    public function __get($propertyName)
    {
        if (array_key_exists($propertyName, $this->body))
            return $this->body[$propertyName];
    }

    /**
     * @return array
     */
    public function toArray() : array
    {
        return $this->body;
    }

}
