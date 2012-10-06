<?php

/**
 * Spell form base class.
 *
 * @method Spell getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSpellForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'nom'         => new sfWidgetFormInputText(),
      'sprite'      => new sfWidgetFormInputText(),
      'spriteinfos' => new sfWidgetFormInputText(),
      'lvl1'        => new sfWidgetFormTextarea(),
      'lvl2'        => new sfWidgetFormTextarea(),
      'lvl3'        => new sfWidgetFormTextarea(),
      'lvl4'        => new sfWidgetFormTextarea(),
      'lvl5'        => new sfWidgetFormTextarea(),
      'lvl6'        => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'         => new sfValidatorString(array('max_length' => 100)),
      'sprite'      => new sfValidatorInteger(array('required' => false)),
      'spriteinfos' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'lvl1'        => new sfValidatorString(),
      'lvl2'        => new sfValidatorString(),
      'lvl3'        => new sfValidatorString(),
      'lvl4'        => new sfValidatorString(),
      'lvl5'        => new sfValidatorString(),
      'lvl6'        => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('spell[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Spell';
  }

}
