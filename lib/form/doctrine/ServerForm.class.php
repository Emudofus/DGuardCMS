<?php

/**
 * Server form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServerForm extends BaseServerForm
{
	public function configure()
	{
		$this->widgetSchema['ip'] = new sfWidgetFormIp();
		$this->validatorSchema['ip'] = new sfValidatorIp();
	}
}
