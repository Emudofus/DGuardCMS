<?php

/**
 * GiftTemplate filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGiftTemplateFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'        => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'img_url'     => new sfWidgetFormFilterInput(),
      'items'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Item'), 'add_empty' => true)),
      'price'       => new sfWidgetFormFilterInput(),
      'max'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'name'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'img_url'     => new sfValidatorPass(array('required' => false)),
      'items'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Item'), 'column' => 'id')),
      'price'       => new sfValidatorPass(array('required' => false)),
      'max'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('gift_template_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftTemplate';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'name'        => 'Text',
      'description' => 'Text',
      'img_url'     => 'Text',
      'items'       => 'ForeignKey',
      'price'       => 'Text',
      'max'         => 'Text',
    );
  }
}
