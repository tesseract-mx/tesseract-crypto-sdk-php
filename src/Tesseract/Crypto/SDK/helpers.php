<?php namespace Tesseract\Crypto\SDK;

use Psr\Http\Message\StreamInterface;
use Tesseract\Crypto\SDK\Http\StatusCode;

if(!function_exists('is_success'))
{
    /**
     * Check if is success status code
     *
     * @param int $statusCode
     * @return bool
     */
    function is_success(int $statusCode) : bool
    {
        return $statusCode == StatusCode::OK;
    }
}

if(!function_exists('to_array'))
{
    /**
     * Convert StreamInterface to array
     *
     * @param StreamInterface $stream
     * @return array
     */
    function to_array(StreamInterface $stream) : array
    {
        return json_decode($stream->getContents(), TRUE);
    }
}
