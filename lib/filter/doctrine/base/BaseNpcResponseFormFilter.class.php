<?php

/**
 * NpcResponse filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNpcResponseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'args'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'type'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'args'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('npc_response_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcResponse';
  }

  public function getFields()
  {
    return array(
      'responseid' => 'Number',
      'type'       => 'Number',
      'args'       => 'Text',
    );
  }
}
