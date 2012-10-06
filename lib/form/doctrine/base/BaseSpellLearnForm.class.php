<?php

/**
 * SpellLearn form base class.
 *
 * @method SpellLearn getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSpellLearnForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'classe'   => new sfWidgetFormInputText(),
      'level'    => new sfWidgetFormInputText(),
      'spellid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Spell'), 'add_empty' => false)),
      'position' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'classe'   => new sfValidatorInteger(),
      'level'    => new sfValidatorInteger(),
      'spellid'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Spell'))),
      'position' => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('spell_learn[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpellLearn';
  }

}
