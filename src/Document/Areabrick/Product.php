<?php

namespace App\Document\Areabrick;

class Product extends AbstractAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->trans('app.areabrick.product.name');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->trans('app.areabrick.product.description');
    }

    /**
     * @return string|null
     */
    public function getIcon(): string
    {
        return self::DEFAULT_ICON_PATH . 'accordion.svg';
    }
}
