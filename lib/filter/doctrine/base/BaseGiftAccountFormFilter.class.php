<?php

/**
 * GiftAccount filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseGiftAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'gift_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Gift'), 'add_empty' => true)),
      'account_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Account'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'gift_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Gift'), 'column' => 'id')),
      'account_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Account'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('gift_account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'GiftAccount';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'gift_id'    => 'ForeignKey',
      'account_id' => 'ForeignKey',
    );
  }
}
