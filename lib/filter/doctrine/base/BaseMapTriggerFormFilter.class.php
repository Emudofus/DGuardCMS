<?php

/**
 * MapTrigger filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMapTriggerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'mapid'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('StartMap'), 'add_empty' => true)),
      'cellid' => new sfWidgetFormFilterInput(),
      'newmap' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'mapid'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('StartMap'), 'column' => 'id')),
      'cellid' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'newmap' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('map_trigger_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapTrigger';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'mapid'  => 'ForeignKey',
      'cellid' => 'Number',
      'newmap' => 'Text',
    );
  }
}
