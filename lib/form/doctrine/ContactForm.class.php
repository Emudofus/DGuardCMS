<?php

/**
 * Contact form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends BaseContactForm
{
	public function configure()
	{
		$this->useFields(array('content'));
		$this->widgetSchema['content'] = new sfWidgetFormTextarea();
		$this->validatorSchema['content'] = new sfValidatorString(array('min_length' => 30, 'max_length' => 300));

		$this->widgetSchema->setLabels(array('content' => sfContext::getInstance()->getI18N()->__('Your message')));
	}
}
