<?php

/**
 * Pano filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePanoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'items'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects2' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects3' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects4' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects5' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects6' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects7' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'effects8' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'      => new sfValidatorPass(array('required' => false)),
      'items'    => new sfValidatorPass(array('required' => false)),
      'effects2' => new sfValidatorPass(array('required' => false)),
      'effects3' => new sfValidatorPass(array('required' => false)),
      'effects4' => new sfValidatorPass(array('required' => false)),
      'effects5' => new sfValidatorPass(array('required' => false)),
      'effects6' => new sfValidatorPass(array('required' => false)),
      'effects7' => new sfValidatorPass(array('required' => false)),
      'effects8' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pano_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pano';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'nom'      => 'Text',
      'items'    => 'Text',
      'effects2' => 'Text',
      'effects3' => 'Text',
      'effects4' => 'Text',
      'effects5' => 'Text',
      'effects6' => 'Text',
      'effects7' => 'Text',
      'effects8' => 'Text',
    );
  }
}
