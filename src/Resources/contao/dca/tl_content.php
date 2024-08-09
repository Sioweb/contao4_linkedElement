<?php 

/*
 * Contao Open Source CMS
 */

/**
* @file tl_content.php
* @author Sascha Weidner
* @version 3.1.0
* @package sioweb.contao.extensions.ce
* @copyright Sascha Weidner, Sioweb
* 
*/


foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $pKey => &$palette)
{
	if(!is_array($palette))
	{
		$palette = preg_replace('/(\{type_legend\},[^;]+);/is','$1,linkedElement,linkedElementTarget;',$palette);
	}
}

$GLOBALS['TL_DCA']['tl_content']['fields']['linkedElement'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['linkedElement'],
	'exclude'                 => true,
	'search'                  => true,
	'inputType'               => 'text',
    'eval'                    => array('rgxp'=>'url', 'decodeEntities'=>true, 'maxlength'=>2048, 'dcaPicker'=>true, 'tl_class'=>'w50'),
    'sql'                     => "varchar(2048) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['linkedElementTarget'] = $GLOBALS['TL_DCA']['tl_content']['fields']['target'];