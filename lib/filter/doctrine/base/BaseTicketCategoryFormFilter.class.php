<?php

/**
 * TicketCategory filter form base class.
 *
 * @package    DGuardCMS
 * @subpackage filter
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTicketCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tickets'), 'add_empty' => true)),
      'name'        => new sfWidgetFormFilterInput(),
      'icon'        => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
      'root_id'     => new sfWidgetFormFilterInput(),
      'lft'         => new sfWidgetFormFilterInput(),
      'rgt'         => new sfWidgetFormFilterInput(),
      'level'       => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Tickets'), 'column' => 'name')),
      'name'        => new sfValidatorPass(array('required' => false)),
      'icon'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'root_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'lft'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'rgt'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'level'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('ticket_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TicketCategory';
  }

  public function getFields()
  {
    return array(
      'id'          => 'ForeignKey',
      'name'        => 'Text',
      'icon'        => 'Text',
      'description' => 'Text',
      'root_id'     => 'Number',
      'lft'         => 'Number',
      'rgt'         => 'Number',
      'level'       => 'Number',
    );
  }
}
