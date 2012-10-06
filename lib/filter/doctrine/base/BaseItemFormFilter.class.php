<?php

/**
 * Item filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'level'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weight'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'weaponinfo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'twohands'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'isethereal'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'forgemageable' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'isbuff'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'usable'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'targetable'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'conditions'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stats'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'type'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'weight'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'weaponinfo'    => new sfValidatorPass(array('required' => false)),
      'twohands'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isethereal'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'forgemageable' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'isbuff'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'usable'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'targetable'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'conditions'    => new sfValidatorPass(array('required' => false)),
      'stats'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'type'          => 'Number',
      'level'         => 'Number',
      'weight'        => 'Number',
      'weaponinfo'    => 'Text',
      'twohands'      => 'Number',
      'isethereal'    => 'Number',
      'forgemageable' => 'Number',
      'isbuff'        => 'Number',
      'usable'        => 'Number',
      'targetable'    => 'Number',
      'price'         => 'Number',
      'conditions'    => 'Text',
      'stats'         => 'Text',
    );
  }
}
