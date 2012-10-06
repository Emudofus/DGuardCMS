<?php

/**
 * TicketCategory form base class.
 *
 * @method TicketCategory getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTicketCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Tickets'), 'add_empty' => true)),
      'name'        => new sfWidgetFormInputText(),
      'icon'        => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormInputText(),
      'root_id'     => new sfWidgetFormInputText(),
      'lft'         => new sfWidgetFormInputText(),
      'rgt'         => new sfWidgetFormInputText(),
      'level'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Tickets'), 'required' => false)),
      'name'        => new sfValidatorPass(array('required' => false)),
      'icon'        => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
      'root_id'     => new sfValidatorInteger(array('required' => false)),
      'lft'         => new sfValidatorInteger(array('required' => false)),
      'rgt'         => new sfValidatorInteger(array('required' => false)),
      'level'       => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ticket_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TicketCategory';
  }

}
