<?php

/**
 * Account form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FrontendAccountForm extends AccountForm
{
	public function configure()
	{
		parent::configure();

		$this->validatorSchema['username'] = new sfValidatorDoctrineUnique(array('model' => 'Account', 'column' => 'username'));

		$this->widgetSchema['password'] = new sfWidgetFormInputPassword();
		$this->validatorSchema['password'] = new sfValidatorString(array('max_length' => 255));

		$this->widgetSchema['question'] = new sfWidgetFormInputText();
		$this->widgetSchema['reponse'] = new sfWidgetFormInputText();

		$this->validatorSchema['question']->setOption('required', false);
		$this->validatorSchema['reponse']->setOption('required', false);

		if (null !== ($public = sfDbConfigHandler::get('recaptcha_public_key')) && null !== ($private = sfDbConfigHandler::get('recaptcha_private_key')))
		{
			$this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array('public_key' => $public));
			$this->validatorScema['captcha'] = new sfValidatorReCaptcha(array('private_key' => $private));
		}


		$this->useFields(array('username', 'pseudo', 'password', 'mail', 'question', 'reponse'));
	}
}
