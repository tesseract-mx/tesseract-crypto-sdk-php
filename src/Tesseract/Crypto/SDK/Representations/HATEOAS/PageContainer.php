<?php namespace Tesseract\Crypto\SDK\Representations\HATEOAS;

use Tesseract\Crypto\SDK\Representations\Representation;

/**
 * Class PageContainer
 * @package Tesseract\Crypto\SDK\Representations
 */
class PageContainer extends Representation
{

    /**
     *
     */
    const _CONTENT = '_content';

    /**
     *
     */
    const _LINKS = '_links';

    /**
     *
     */
    const _PAGE = '_page';

    /**
     *
     */
    const CONTENT = 'content';

    /**
     *
     */
    const LINKS = 'links';

    /**
     *
     */
    const PAGE = 'page';


    /**
     * @return Page
     */
    public function page() : Page
    {
        return new Page($this->{PageContainer::PAGE});
    }

    /**
     * @return array
     */
    public function getProperties() : array
    {
        return [
            PageContainer::_CONTENT => PageContainer::CONTENT,
            PageContainer::_LINKS => PageContainer::LINKS,
            PageContainer::_PAGE => PageContainer::PAGE,
        ];
    }
}