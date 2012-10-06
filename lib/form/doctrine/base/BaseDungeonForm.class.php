<?php

/**
 * Dungeon form base class.
 *
 * @method Dungeon getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDungeonForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'startmap' => new sfWidgetFormInputHidden(),
      'mapid'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Map'), 'add_empty' => false)),
      'cellid'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'startmap' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('startmap')), 'empty_value' => $this->getObject()->get('startmap'), 'required' => false)),
      'mapid'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Map'))),
      'cellid'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('dungeon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Dungeon';
  }

}
