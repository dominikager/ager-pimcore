<?php

namespace App\Document\Areabrick;

class Video extends AbstractAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->trans('app.areabrick.video.name');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->trans('app.areabrick.video.description');
    }

    /**
     * @return string|null
     */
    public function getIcon(): string
    {
        return self::DEFAULT_ICON_PATH . 'accordion.svg';
    }
}
