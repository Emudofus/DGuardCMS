<?php
class MailForm extends BaseForm
{
	public function setUp()
	{
		$this->setWidgets(array(
				'gmlevel' => new sfWidgetFormChoice(array('default' => 0, 'choices' => myUser::getRanks(false), 'expanded' => true)),
				'subject' => new sfWidgetFormInputText(),
				'message' => new sfWidgetFormTextarea(),
			));
		$this->setValidators(array(
				'gmlevel' => new sfValidatorChoice(array('choices' => array_keys(myUser::getRanks(false)))),
				'subject' => new sfValidatorString(array('min_length' => 5, 'max_length' => 100)),
				'message' => new sfValidatorString(array('min_length' => 10, 'max_length' => 500)),
			));

		$this->widgetSchema['gmlevel']->setLabel('Minimum level');
		$this->widgetSchema->setHelp('gmlevel', 'Minimum gmlevel to receive this mail');

		$this->widgetSchema->setNameFormat('mail[%s]');
	}
}