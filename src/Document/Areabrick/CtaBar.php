<?php

namespace App\Document\Areabrick;

class CtaBar extends AbstractAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->trans('app.areabrick.cta_bar.name');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->trans('app.areabrick.cta_bar.description');
    }

    /**
     * @return string|null
     */
    public function getIcon(): string
    {
        return self::DEFAULT_ICON_PATH . 'accordion.svg';
    }
}
