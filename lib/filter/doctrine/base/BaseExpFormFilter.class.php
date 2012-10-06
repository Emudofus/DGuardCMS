<?php

/**
 * Exp filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExpFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'character' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'job'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mount'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pvp'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'character' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'job'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mount'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'pvp'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('exp_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Exp';
  }

  public function getFields()
  {
    return array(
      'level'     => 'Number',
      'character' => 'Number',
      'job'       => 'Number',
      'mount'     => 'Number',
      'pvp'       => 'Number',
    );
  }
}
