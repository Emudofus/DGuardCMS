<?php

/**
 * FAQ filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseFAQFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'question' => new sfWidgetFormFilterInput(),
      'answer'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'question' => new sfValidatorPass(array('required' => false)),
      'answer'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('faq_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'FAQ';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'question' => 'Text',
      'answer'   => 'Text',
    );
  }
}
