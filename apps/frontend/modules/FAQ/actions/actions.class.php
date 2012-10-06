<?php

/**
 * FAQ actions.
 *
 * @package    DGuardCMS
 * @subpackage FAQ
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FAQActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->FAQ = Doctrine_Core::getTable('FAQ')->findAll();
	}
}
