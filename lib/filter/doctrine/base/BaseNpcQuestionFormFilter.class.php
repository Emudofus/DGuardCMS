<?php

/**
 * NpcQuestion filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseNpcQuestionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'questionid' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'responses'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'questionid' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'responses'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('npc_question_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'NpcQuestion';
  }

  public function getFields()
  {
    return array(
      'npcid'      => 'Number',
      'questionid' => 'Number',
      'responses'  => 'Text',
    );
  }
}
