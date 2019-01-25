<?php namespace Tesseract\Crypto\SDK\Representations\HATEOAS;

use Tesseract\Crypto\SDK\Representations\Representation;

/**
 * Class Page
 * @package Tesseract\Crypto\SDK\Representations\HATEOAS
 */
class Page extends Representation
{

    const SIZE = 'size';

    const TOTAL_ELEMENTS = 'total_elements';

    const TOTAL_PAGES = 'total_pages';

    const NUMBER = 'number';

    /**
     * @return array
     */
    public function getProperties(): array
    {
        return [
            self::SIZE => self::SIZE,
            self::TOTAL_ELEMENTS => self::TOTAL_ELEMENTS,
            self::TOTAL_PAGES => self::TOTAL_PAGES,
            self::NUMBER => self::NUMBER,
        ];
    }

}