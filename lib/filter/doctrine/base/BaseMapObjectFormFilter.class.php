<?php

/**
 * MapObject filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMapObjectFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'walkable'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'objectlist' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'actionlist' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'respawn'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'walkable'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'objectlist' => new sfValidatorPass(array('required' => false)),
      'actionlist' => new sfValidatorPass(array('required' => false)),
      'respawn'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('map_object_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MapObject';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'walkable'   => 'Number',
      'objectlist' => 'Text',
      'actionlist' => 'Text',
      'respawn'    => 'Number',
    );
  }
}
