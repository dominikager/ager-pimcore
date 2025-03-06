<?php

namespace App\Document\Areabrick;

use JetBrains\PhpStorm\ArrayShape;
use Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration;
use Pimcore\Extension\Document\Areabrick\EditableDialogBoxInterface;
use Pimcore\Model\Document\Editable;
use Pimcore\Translation\Translator;

abstract class AbstractAreabrick extends AbstractTemplateAreabrick implements EditableDialogBoxInterface
{
    public const DEFAULT_ICON_PATH = '/bundles/pimcoreadmin/img/flat-white-icons/';

    protected Translator $translator;

    private array $customConfig;

    /**
     * AbstractAreabrick constructor
     *
     * @param \App\Service\EditableDialogBoxService $editableDialogBoxService
     * @param \Pimcore\Translation\Translator $translator
     */
    public function __construct(Translator $translator)
    {
        $this->translator = $translator;

        $this->customConfig = $this->setCustomConfig();
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return '1.0.0';
    }

    /**
     * Get template location
     *
     * @return string
     * @see \Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick::getTemplateLocation()
     */
    public function getTemplateLocation(): string
    {
        return static::TEMPLATE_LOCATION_GLOBAL;
    }

    /**
     * Get template suffix
     *
     * @return string
     * @see \Pimcore\Extension\Document\Areabrick\AbstractTemplateAreabrick::getTemplateSuffix()
     */
    public function getTemplateSuffix(): string
    {
        return static::TEMPLATE_SUFFIX_TWIG;
    }

    /**
     * Set hasEditTemplate
     *
     * @return bool
     * @see \Pimcore\Extension\Document\Areabrick\AbstractAreabrick::hasEditTemplate()
     */
    public function hasEditTemplate(): bool
    {
        return false;
    }

    /**
     * Get open HTML tag
     *
     * @param \App\Document\Areabrick\App\Document\Areabrick\Editable\Area\Info $info
     *
     * @return string
     * @see \Pimcore\Extension\Document\Areabrick\AbstractAreabrick::getHtmlTagOpen()
     */
    public function getHtmlTagOpen(Editable\Area\Info $info): string
    {
        return '';
    }

    /**
     * Get closing HTML tag
     *
     * @param \App\Document\Areabrick\App\Document\Areabrick\Editable\Area\Info $info
     *
     * @return string
     * @see \Pimcore\Extension\Document\Areabrick\AbstractAreabrick::getHtmlTagClose()
     */
    public function getHtmlTagClose(Editable\Area\Info $info): string
    {
        return '';
    }

    /**
     * @return EditableDialogBoxConfiguration
     */
    public function getIconModal(): EditableDialogBoxConfiguration
    {
        $icons = [
            [null, 'None'],
            ['hexenschuss', 'Hexenschuss'],
            ['schneemaenner', 'Schneemaenner'],
            ['ski-hexe', 'Ski-hexe'],
            ['hat', 'Hexenhut'],
            ['snowflake', 'Schneeflocken'],
            ['winterhexen', 'Winterhexen'],
        ];

        $animations = [
            ['none', 'none'],
            ['animate__animated animate__swing animate__infinite', 'swing'],
            ['animate__animated animate__pulse animate__infinite', 'pulse'],
            ['animate__animated animate__heartBeat animate__infinite', 'heartBeat'],
        ];

        $config = new EditableDialogBoxConfiguration();
        $config->setWidth(600);
        $config->setHeight(800);

        $config->setItems([
            'type' => 'tabpanel',
            'items' => [
                [
                    'type' => 'panel',
                    'title' => 'Left',
                    'items' => [
                        (new Editable\Select())
                            ->setName('iconTopLeft')
                            ->setConfig([
                                'store' => $icons
                            ]),
                        (new Editable\Numeric())
                            ->setName('spaceTopLeftInPercent'),
                        (new Editable\Select())
                            ->setName('animationTopLeft')
                            ->setConfig([
                                'store' => $animations
                            ]),
                    ]
                ],
                [
                    'type' => 'panel',
                    'title' => 'Right',
                    'items' => [
                        (new Editable\Select())
                            ->setName('iconTopRight')
                            ->setConfig([
                                'store' => $icons
                            ]),
                        (new Editable\Numeric())
                            ->setName('spaceTopRightInPercent'),
                        (new Editable\Select())
                            ->setName('animationTopRight')
                            ->setConfig([
                                'store' => $animations
                            ]),
                    ]
                ],
            ]
        ]);

        return $config;
    }

    /**
     * Set custom Configuration
     *
     * @return array
     */
    protected function setCustomConfig(): array
    {
        return [];
    }

    /**
     * Get EditableDialogboxConfiguration Object
     *
     * @param \Pimcore\Model\Document\Editable $area
     * @param \Pimcore\Model\Document\Editable\Area\Info|null $info
     *
     * @return \Pimcore\Extension\Document\Areabrick\EditableDialogBoxConfiguration
     */
    public function getEditableDialogBoxConfiguration(Editable $area, ?Editable\Area\Info $info): EditableDialogBoxConfiguration
    {
        $editableDialogBoxConfiguration = new EditableDialogBoxConfiguration();
        $editableDialogBoxConfiguration->setWidth(800);
        $editableDialogBoxConfiguration->setHeight(800);

        //$editableDialogBoxConfiguration->setItems($this->mergeEditableConfig());

        return $editableDialogBoxConfiguration;
    }

    #[ArrayShape(['type' => 'string', 'title' => 'string', 'items' => 'array'])]
    /**
     * Merge custom and global configuration
     *
     * @return array
     */
    protected function mergeEditableConfig()
    {
        return [
            'type' => 'tabpanel',
            'title' => $this->trans('app.edit.header.settings'),
            'items' => array_merge($this->customConfig),
        ];
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function trans($id): string
    {
        return $this->translator->trans($id, [], 'admin');
    }
}
