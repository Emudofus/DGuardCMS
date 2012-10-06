<?php

/**
 * NpcResponse form base class.
 *
 * @method NpcResponse getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNpcResponseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'responseid' => new sfWidgetFormInputHidden(),
      'type'       => new sfWidgetFormInputText(),
      'args'       => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'responseid' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('responseid')), 'empty_value' => $this->getObject()->get('responseid'), 'required' => false)),
      'type'       => new sfValidatorInteger(),
      'args'       => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('npc_response[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcResponse';
  }

}
