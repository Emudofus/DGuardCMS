<?php

/**
 * MonsterLevel filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMonsterLevelFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'templateid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Monster'), 'add_empty' => true)),
      'level'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pa'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pm'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'vie'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'size'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'caracts'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'resistances' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spells'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'templateid'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Monster'), 'column' => 'id')),
      'level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pa'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pm'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'vie'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'size'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'caracts'     => new sfValidatorPass(array('required' => false)),
      'resistances' => new sfValidatorPass(array('required' => false)),
      'spells'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('monster_level_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MonsterLevel';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'templateid'  => 'ForeignKey',
      'level'       => 'Number',
      'pa'          => 'Number',
      'pm'          => 'Number',
      'vie'         => 'Number',
      'size'        => 'Number',
      'caracts'     => 'Text',
      'resistances' => 'Text',
      'spells'      => 'Text',
    );
  }
}
