<?php

/**
 * Zaapi form base class.
 *
 * @method Zaapi getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZaapiForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'mapid'  => new sfWidgetFormInputHidden(),
      'cellid' => new sfWidgetFormInputText(),
      'zone'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mapid'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mapid')), 'empty_value' => $this->getObject()->get('mapid'), 'required' => false)),
      'cellid' => new sfValidatorInteger(),
      'zone'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('zaapi[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zaapi';
  }

}
