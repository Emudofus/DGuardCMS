<?php

/**
 * Npc form base class.
 *
 * @method Npc getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNpcForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'name'        => new sfWidgetFormTextarea(),
      'gfx'         => new sfWidgetFormInputText(),
      'size'        => new sfWidgetFormInputText(),
      'sex'         => new sfWidgetFormInputText(),
      'color1'      => new sfWidgetFormInputText(),
      'color2'      => new sfWidgetFormInputText(),
      'color3'      => new sfWidgetFormInputText(),
      'items'       => new sfWidgetFormTextarea(),
      'artwork'     => new sfWidgetFormInputText(),
      'bonus'       => new sfWidgetFormInputText(),
      'sellinglist' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'        => new sfValidatorString(array('required' => false)),
      'gfx'         => new sfValidatorInteger(array('required' => false)),
      'size'        => new sfValidatorInteger(array('required' => false)),
      'sex'         => new sfValidatorInteger(array('required' => false)),
      'color1'      => new sfValidatorInteger(array('required' => false)),
      'color2'      => new sfValidatorInteger(array('required' => false)),
      'color3'      => new sfValidatorInteger(array('required' => false)),
      'items'       => new sfValidatorString(array('required' => false)),
      'artwork'     => new sfValidatorInteger(array('required' => false)),
      'bonus'       => new sfValidatorInteger(array('required' => false)),
      'sellinglist' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('npc[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Npc';
  }

}
