<?php

/**
 * Npc filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNpcFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'gfx'         => new sfWidgetFormFilterInput(),
      'size'        => new sfWidgetFormFilterInput(),
      'sex'         => new sfWidgetFormFilterInput(),
      'color1'      => new sfWidgetFormFilterInput(),
      'color2'      => new sfWidgetFormFilterInput(),
      'color3'      => new sfWidgetFormFilterInput(),
      'items'       => new sfWidgetFormFilterInput(),
      'artwork'     => new sfWidgetFormFilterInput(),
      'bonus'       => new sfWidgetFormFilterInput(),
      'sellinglist' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'gfx'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'size'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sex'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color1'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color2'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'color3'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'items'       => new sfValidatorPass(array('required' => false)),
      'artwork'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bonus'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'sellinglist' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('npc_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Npc';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'gfx'         => 'Number',
      'size'        => 'Number',
      'sex'         => 'Number',
      'color1'      => 'Number',
      'color2'      => 'Number',
      'color3'      => 'Number',
      'items'       => 'Text',
      'artwork'     => 'Number',
      'bonus'       => 'Number',
      'sellinglist' => 'Text',
    );
  }
}
