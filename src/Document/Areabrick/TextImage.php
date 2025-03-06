<?php

namespace App\Document\Areabrick;

class TextImage extends AbstractAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->trans('app.areabrick.text_image.name');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->trans('app.areabrick.text_image.description');
    }

    /**
     * @return string|null
     */
    public function getIcon(): string
    {
        return self::DEFAULT_ICON_PATH . 'accordion.svg';
    }
}
