<?php

/**
 * Zaapi filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseZaapiFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'cellid' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'zone'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'cellid' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'zone'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('zaapi_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zaapi';
  }

  public function getFields()
  {
    return array(
      'id'     => 'Number',
      'mapid'  => 'Number',
      'cellid' => 'Number',
      'zone'   => 'Number',
    );
  }
}
