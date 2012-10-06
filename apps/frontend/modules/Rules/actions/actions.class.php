<?php

/**
 * Rules actions.
 *
 * @package    DGuardCMS
 * @subpackage Rules
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RulesActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
	{
		$this->rules = Doctrine_Core::getTable('Rule')->findAll();
	}
}
