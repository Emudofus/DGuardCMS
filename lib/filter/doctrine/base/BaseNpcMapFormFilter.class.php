<?php

/**
 * NpcMap filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNpcMapFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mapid'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Map'), 'add_empty' => true)),
      'templateid' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Npc'), 'add_empty' => true)),
      'cell'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dir'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'mapid'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Map'), 'column' => 'id')),
      'templateid' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Npc'), 'column' => 'id')),
      'cell'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dir'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('npc_map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcMap';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'mapid'      => 'ForeignKey',
      'templateid' => 'ForeignKey',
      'cell'       => 'Number',
      'dir'        => 'Number',
    );
  }
}
