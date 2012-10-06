<?php

/**
 * Monster filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMonsterFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'color1' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color2' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color3' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'skin'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nom'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'exp'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kamas'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'drop'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ai'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'color1' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color2' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color3' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'skin'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'nom'    => new sfValidatorPass(array('required' => false)),
      'exp'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'kamas'  => new sfValidatorPass(array('required' => false)),
      'drop'   => new sfValidatorPass(array('required' => false)),
      'ai'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('monster_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Monster';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'color1' => 'Number',
      'color2' => 'Number',
      'color3' => 'Number',
      'skin'   => 'Number',
      'nom'    => 'Text',
      'exp'    => 'Number',
      'kamas'  => 'Text',
      'drop'   => 'Text',
      'ai'     => 'Number',
    );
  }
}
