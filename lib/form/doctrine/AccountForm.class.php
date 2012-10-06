<?php

/**
 * Account form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountForm extends BaseAccountForm
{
	public function configure()
	{
		$this->validatorSchema['mail'] = new sfValidatorEmail();

		$this->widgetSchema['banned'] = new sfWidgetFormInputCheckbox();
		$this->validatorSchema['banned'] = new sfValidatorBoolean();

		$this->widgetSchema['banned']->setDefault(false);

		$this->widgetSchema['gmlevel'] = new sfWidgetFormChoice(array('default' => 0, 'choices' => myUser::getRanks(false), 'expanded' => true));
		$this->validatorSchema['gmlevel'] = new sfValidatorChoice(array('choices' => array_keys(myUser::getRanks(false))));

		$this->widgetSchema['points']->setDefault(0);
		$this->validatorSchema['points']->setOption('min', 0);
		$this->validatorSchema['points']->setOption('required', false);

		$this->validatorSchema['question']->setOption('required', false);
		$this->validatorSchema['reponse']->setOption('required', false);

		unset($this['timestamp'], $this['password']);
	}
}
