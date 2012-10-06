<?php

/**
 * Pano form base class.
 *
 * @method Pano getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePanoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'nom'      => new sfWidgetFormInputText(),
      'items'    => new sfWidgetFormTextarea(),
      'effects2' => new sfWidgetFormTextarea(),
      'effects3' => new sfWidgetFormTextarea(),
      'effects4' => new sfWidgetFormTextarea(),
      'effects5' => new sfWidgetFormTextarea(),
      'effects6' => new sfWidgetFormTextarea(),
      'effects7' => new sfWidgetFormTextarea(),
      'effects8' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'      => new sfValidatorString(array('max_length' => 255)),
      'items'    => new sfValidatorString(),
      'effects2' => new sfValidatorString(),
      'effects3' => new sfValidatorString(),
      'effects4' => new sfValidatorString(),
      'effects5' => new sfValidatorString(),
      'effects6' => new sfValidatorString(),
      'effects7' => new sfValidatorString(),
      'effects8' => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('pano[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pano';
  }

}
