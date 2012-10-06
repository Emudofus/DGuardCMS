<?php

/**
 * Monster form base class.
 *
 * @method Monster getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMonsterForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'color1' => new sfWidgetFormInputText(),
      'color2' => new sfWidgetFormInputText(),
      'color3' => new sfWidgetFormInputText(),
      'skin'   => new sfWidgetFormInputText(),
      'nom'    => new sfWidgetFormInputText(),
      'exp'    => new sfWidgetFormInputText(),
      'kamas'  => new sfWidgetFormInputText(),
      'drop'   => new sfWidgetFormTextarea(),
      'ai'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'color1' => new sfValidatorInteger(),
      'color2' => new sfValidatorInteger(),
      'color3' => new sfValidatorInteger(),
      'skin'   => new sfValidatorInteger(),
      'nom'    => new sfValidatorString(array('max_length' => 255)),
      'exp'    => new sfValidatorInteger(),
      'kamas'  => new sfValidatorString(array('max_length' => 255)),
      'drop'   => new sfValidatorString(),
      'ai'     => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('monster[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Monster';
  }

}
