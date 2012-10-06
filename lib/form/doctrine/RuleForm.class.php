<?php

/**
 * Rule form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RuleForm extends BaseRuleForm
{
	public function configure()
	{
		$this->widgetSchema['content'] = new sfWidgetFormTextarea();
	}
}
