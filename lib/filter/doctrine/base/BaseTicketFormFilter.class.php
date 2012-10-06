<?php

/**
 * Ticket filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTicketFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Answers'), 'add_empty' => true)),
      'category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => true)),
      'state'       => new sfWidgetFormChoice(array('choices' => array('' => '', 'locked' => 'locked', 'to do' => 'to do', 'resolved' => 'resolved', 'resolving' => 'resolving', 'deleted' => 'deleted'))),
      'name'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Answers'), 'column' => 'updated_at')),
      'category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Category'), 'column' => 'level')),
      'state'       => new sfValidatorChoice(array('required' => false, 'choices' => array('locked' => 'locked', 'to do' => 'to do', 'resolved' => 'resolved', 'resolving' => 'resolving', 'deleted' => 'deleted'))),
      'name'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Ticket';
  }

  public function getFields()
  {
    return array(
      'id'          => 'ForeignKey',
      'category_id' => 'ForeignKey',
      'state'       => 'Enum',
      'name'        => 'Text',
    );
  }
}
