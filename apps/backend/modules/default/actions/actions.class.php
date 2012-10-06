<?php

/**
 * default actions.
 *
 * @package    DGuardCMS
 * @subpackage default
 * @author     Andaeriel
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions
{
	public function executeLogin(sfWebRequest $request)
	{
		$this->setLayout('base_layout');
	}
	public function executeSecure(sfWebRequest $request)
	{
		$this->redirect('default/login');
	}
}
