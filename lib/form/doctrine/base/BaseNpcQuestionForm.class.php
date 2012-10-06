<?php

/**
 * NpcQuestion form base class.
 *
 * @method NpcQuestion getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseNpcQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'npcid'      => new sfWidgetFormInputHidden(),
      'questionid' => new sfWidgetFormInputText(),
      'responses'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'npcid'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('npcid')), 'empty_value' => $this->getObject()->get('npcid'), 'required' => false)),
      'questionid' => new sfValidatorInteger(),
      'responses'  => new sfValidatorString(),
    ));

    $this->widgetSchema->setNameFormat('npc_question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcQuestion';
  }

}
