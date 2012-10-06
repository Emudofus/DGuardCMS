<?php

/**
 * Account filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'username'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'pseudo'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'password'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mail'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'question'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'reponse'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'gmlevel'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'banned'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'points'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'timestamp' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'username'  => new sfValidatorPass(array('required' => false)),
      'pseudo'    => new sfValidatorPass(array('required' => false)),
      'password'  => new sfValidatorPass(array('required' => false)),
      'mail'      => new sfValidatorPass(array('required' => false)),
      'question'  => new sfValidatorPass(array('required' => false)),
      'reponse'   => new sfValidatorPass(array('required' => false)),
      'gmlevel'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'banned'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'points'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'timestamp' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'username'  => 'Text',
      'pseudo'    => 'Text',
      'password'  => 'Text',
      'mail'      => 'Text',
      'question'  => 'Text',
      'reponse'   => 'Text',
      'gmlevel'   => 'Number',
      'banned'    => 'Number',
      'points'    => 'Number',
      'timestamp' => 'Number',
    );
  }
}
