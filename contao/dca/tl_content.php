<?php

declare(strict_types=1);

/**
 * @author Sascha Weidner <https://www.sioweb.de>
 * @copyright Sioweb, Sascha Weidner
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// Extend the default palettes
$objPalette = PaletteManipulator::create()
    ->addField(['linkedElement', 'linkedElementTarget'], 'type_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_content')
;

foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $name => $palette)
{
    if (!is_array($palette))
    {
        $objPalette->applyToPalette($name, 'tl_content');
    }
}

$GLOBALS['TL_DCA']['tl_content']['fields']['linkedElement'] = [
    'exclude' => true,
    'search' => true,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'url', 'decodeEntities' => true, 'maxlength' => 2048, 'dcaPicker' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(2048) NOT NULL default ''"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['linkedElementTarget'] = $GLOBALS['TL_DCA']['tl_content']['fields']['target'];
