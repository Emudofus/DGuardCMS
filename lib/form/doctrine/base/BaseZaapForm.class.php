<?php

/**
 * Zaap form base class.
 *
 * @method Zaap getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseZaapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'     => new sfWidgetFormInputHidden(),
      'mapid'  => new sfWidgetFormInputHidden(),
      'cellid' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'mapid'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('mapid')), 'empty_value' => $this->getObject()->get('mapid'), 'required' => false)),
      'cellid' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('zaap[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Zaap';
  }

}
