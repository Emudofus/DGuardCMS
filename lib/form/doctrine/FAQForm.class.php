<?php

/**
 * FAQ form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FAQForm extends BaseFAQForm
{
	public function configure()
	{
		$this->widgetSchema['question'] = new sfWidgetFormTextarea();
		$this->widgetSchema['answer'] = new sfWidgetFormTextarea();
	}
}
