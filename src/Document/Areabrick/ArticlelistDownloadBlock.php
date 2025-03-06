<?php

namespace App\Document\Areabrick;

class ArticlelistDownloadBlock extends AbstractAreabrick
{
    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->trans('app.areabrick.articlelist_download_block.name');
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->trans('app.areabrick.articlelist_download_block.description');
    }

    /**
     * @return string|null
     */
    public function getIcon(): string
    {
        return self::DEFAULT_ICON_PATH . 'accordion.svg';
    }
}
