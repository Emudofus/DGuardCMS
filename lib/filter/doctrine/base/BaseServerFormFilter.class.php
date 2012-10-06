<?php

/**
 * Server filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ip'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'port'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'system_port' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'ip'          => new sfValidatorPass(array('required' => false)),
      'port'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'system_port' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('server_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Server';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'ip'          => 'Text',
      'port'        => 'Number',
      'system_port' => 'Number',
    );
  }
}
