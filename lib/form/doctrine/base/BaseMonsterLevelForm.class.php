<?php

/**
 * MonsterLevel form base class.
 *
 * @method MonsterLevel getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMonsterLevelForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'templateid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Monster'), 'add_empty' => false)),
      'level'       => new sfWidgetFormInputText(),
      'pa'          => new sfWidgetFormInputText(),
      'pm'          => new sfWidgetFormInputText(),
      'vie'         => new sfWidgetFormInputText(),
      'size'        => new sfWidgetFormInputText(),
      'caracts'     => new sfWidgetFormInputText(),
      'resistances' => new sfWidgetFormInputText(),
      'spells'      => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'templateid'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Monster'))),
      'level'       => new sfValidatorInteger(),
      'pa'          => new sfValidatorInteger(),
      'pm'          => new sfValidatorInteger(),
      'vie'         => new sfValidatorInteger(),
      'size'        => new sfValidatorInteger(),
      'caracts'     => new sfValidatorString(array('max_length' => 255)),
      'resistances' => new sfValidatorString(array('max_length' => 255)),
      'spells'      => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('monster_level[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MonsterLevel';
  }

}
