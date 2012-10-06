<?php

/**
 * Spell filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSpellFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'sprite'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'spriteinfos' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl1'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl2'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl3'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl4'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl5'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lvl6'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'         => new sfValidatorPass(array('required' => false)),
      'sprite'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'spriteinfos' => new sfValidatorPass(array('required' => false)),
      'lvl1'        => new sfValidatorPass(array('required' => false)),
      'lvl2'        => new sfValidatorPass(array('required' => false)),
      'lvl3'        => new sfValidatorPass(array('required' => false)),
      'lvl4'        => new sfValidatorPass(array('required' => false)),
      'lvl5'        => new sfValidatorPass(array('required' => false)),
      'lvl6'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('spell_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Spell';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'nom'         => 'Text',
      'sprite'      => 'Number',
      'spriteinfos' => 'Text',
      'lvl1'        => 'Text',
      'lvl2'        => 'Text',
      'lvl3'        => 'Text',
      'lvl4'        => 'Text',
      'lvl5'        => 'Text',
      'lvl6'        => 'Text',
    );
  }
}
