<?php

/**
 * MapObject form base class.
 *
 * @method MapObject getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMapObjectForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormTextarea(),
      'walkable'   => new sfWidgetFormInputText(),
      'objectlist' => new sfWidgetFormTextarea(),
      'actionlist' => new sfWidgetFormTextarea(),
      'respawn'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(),
      'walkable'   => new sfValidatorInteger(),
      'objectlist' => new sfValidatorString(),
      'actionlist' => new sfValidatorString(),
      'respawn'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('map_object[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapObject';
  }

}
