<?php

/**
 * Zaapi form.
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ZaapiForm extends BaseZaapiForm
{
	//pasted from ZaapForm.class.php - PHP sadly not support multiple inheritances
	public function configure()
	{
		//@todo: make a method "Map.getCoords()"
		$this->widgetSchema['mapid'] = new sfWidgetFormDoctrineChoice(array('model' => 'Map'));
		//UNIQUE! One zaap/map only !
		$this->validatorSchema['mapid'] = new sfValidatorDoctrineChoice(array('model' => 'Map'));
	}
}
