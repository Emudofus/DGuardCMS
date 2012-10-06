<?php

/**
 * GiftTemplate form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GiftTemplateForm extends BaseGiftTemplateForm
{
	public function configure()
	{
		$this->setWidget('description', new sfWidgetFormTextarea());

		$this->setWidget('items', new sfWidgetFormInput(array('label' => 'Item')));
		$this->getValidator('items')->setOption('required', true);

		$this->setWidget('max', new sfWidgetFormInputCheckbox());


		$this->useFields(array('description', 'items', 'price', 'max'));
	}
}