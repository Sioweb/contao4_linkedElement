<?php 

/*
 * Contao Open Source CMS
 */

/**
* @file config.php
* @author Sascha Weidner
* @version 3.1.0
* @package sioweb.contao.extensions.ce
* @copyright Sioweb, Sascha Weidner
* 
*/


$GLOBALS['TL_HOOKS']['getContentElement'][] = array('Sioweb\LinkedElement', 'modifyElement');