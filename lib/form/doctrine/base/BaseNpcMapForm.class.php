<?php

/**
 * NpcMap form base class.
 *
 * @method NpcMap getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNpcMapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'mapid'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Map'), 'add_empty' => false)),
      'templateid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Npc'), 'add_empty' => false)),
      'cell'       => new sfWidgetFormInputText(),
      'dir'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mapid'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Map'))),
      'templateid' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Npc'))),
      'cell'       => new sfValidatorInteger(),
      'dir'        => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('npc_map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcMap';
  }

}
