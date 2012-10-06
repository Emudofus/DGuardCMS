<?php

/**
 * Map filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMapFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'width'          => new sfWidgetFormFilterInput(),
      'height'         => new sfWidgetFormFilterInput(),
      'mapdata'        => new sfWidgetFormFilterInput(),
      'decryptkey'     => new sfWidgetFormFilterInput(),
      'createtime'     => new sfWidgetFormFilterInput(),
      'monsters'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximummonster' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'maximumgroup'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'width'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'height'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'mapdata'        => new sfValidatorPass(array('required' => false)),
      'decryptkey'     => new sfValidatorPass(array('required' => false)),
      'createtime'     => new sfValidatorPass(array('required' => false)),
      'monsters'       => new sfValidatorPass(array('required' => false)),
      'maximummonster' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'maximumgroup'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('map_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Map';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'width'          => 'Number',
      'height'         => 'Number',
      'mapdata'        => 'Text',
      'decryptkey'     => 'Text',
      'createtime'     => 'Text',
      'monsters'       => 'Text',
      'maximummonster' => 'Number',
      'maximumgroup'   => 'Number',
    );
  }
}
