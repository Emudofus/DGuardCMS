<?php

/**
 * MapTrigger form base class.
 *
 * @method MapTrigger getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMapTriggerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'mapid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StartMap'), 'add_empty' => true)),
      'cellid' => new sfWidgetFormInputText(),
      'newmap' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mapid'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('StartMap'), 'required' => false)),
      'cellid' => new sfValidatorInteger(array('required' => false)),
      'newmap' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('map_trigger[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapTrigger';
  }

}
