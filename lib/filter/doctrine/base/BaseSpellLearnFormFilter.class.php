<?php

/**
 * SpellLearn filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpellLearnFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'classe'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'level'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spellid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Spell'), 'add_empty' => true)),
      'position' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'classe'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'spellid'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Spell'), 'column' => 'id')),
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('spell_learn_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SpellLearn';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'classe'   => 'Number',
      'level'    => 'Number',
      'spellid'  => 'ForeignKey',
      'position' => 'Number',
    );
  }
}
