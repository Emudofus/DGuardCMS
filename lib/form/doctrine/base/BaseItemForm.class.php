<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormTextarea(),
      'type'          => new sfWidgetFormInputText(),
      'level'         => new sfWidgetFormInputText(),
      'weight'        => new sfWidgetFormInputText(),
      'weaponinfo'    => new sfWidgetFormTextarea(),
      'twohands'      => new sfWidgetFormInputText(),
      'isethereal'    => new sfWidgetFormInputText(),
      'forgemageable' => new sfWidgetFormInputText(),
      'isbuff'        => new sfWidgetFormInputText(),
      'usable'        => new sfWidgetFormInputText(),
      'targetable'    => new sfWidgetFormInputText(),
      'price'         => new sfWidgetFormInputText(),
      'conditions'    => new sfWidgetFormTextarea(),
      'stats'         => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(),
      'type'          => new sfValidatorInteger(),
      'level'         => new sfValidatorInteger(),
      'weight'        => new sfValidatorInteger(),
      'weaponinfo'    => new sfValidatorString(),
      'twohands'      => new sfValidatorInteger(),
      'isethereal'    => new sfValidatorInteger(),
      'forgemageable' => new sfValidatorInteger(),
      'isbuff'        => new sfValidatorInteger(),
      'usable'        => new sfValidatorInteger(),
      'targetable'    => new sfValidatorInteger(),
      'price'         => new sfValidatorInteger(),
      'conditions'    => new sfValidatorString(),
      'stats'         => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

}
