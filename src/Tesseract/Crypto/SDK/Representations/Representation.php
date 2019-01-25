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
            if(in_array($key, array_keys($this->getProperties())))
            {
                $this->body[$this->getProperties()[$key]] = $value;
            }
        }
    }

    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->body))
            return $this->body[$name];
    }


    /**
     * @return array
     */
    public function toArray() : array
    {
        return $this->body;
    }

}
