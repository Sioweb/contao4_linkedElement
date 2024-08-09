<?php

/**
 * Contao Open Source CMS
 */

namespace contao\classes;
use Contao\Frontend;
use Contao\FrontendTemplate;


/**
* @file LinkedElement.php
* @class LinkedElement
* @author Sascha Weidner
* @version 3.1.0
* @package sioweb.contao.extensions.ce
* @copyright Sioweb, Sascha Weidner
*
*/


class LinkedElement extends Frontend
{
	public function modifyElement($objElement, $strBuffer)
	{

		if($objElement->linkedElement)
		{
			$elementObject = new FrontendTemplate('ce_linkedElement');
			$elementObject->setData($objElement->row());

			$elementObject->element = preg_replace('/<a([^>]*)>([^<]*)\<\/a>/is','<span$1>$2</span>',$strBuffer);

			// @todo Use one regex: ( href="[^"]*"| target="[^"]*"| name="[^"]*"| rel="[^"]*")
			$elementObject->element = preg_replace('/<span([^h]*)href[^=]*=[^"]*"[^"]*"([^>]*)>/is','<span$1$2>',$elementObject->element);
			$elementObject->element = preg_replace('/<span([^h]*)name[^=]*=[^"]*"[^"]*"([^>]*)>/is','<span$1$2>',$elementObject->element);
			$elementObject->element = preg_replace('/<span([^h]*)target[^=]*=[^"]*"[^"]*"([^>]*)>/is','<span$1$2>',$elementObject->element);
			$elementObject->element = preg_replace('/<span([^h]*)rel[^=]*=[^"]*"[^"]*"([^>]*)>/is','<span$1$2>',$elementObject->element);

			$strBuffer = $elementObject->parse();
		}

		return $strBuffer;
	}
}
