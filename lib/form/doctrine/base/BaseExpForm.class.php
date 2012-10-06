<?php

/**
 * Exp form base class.
 *
 * @method Exp getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExpForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'level'     => new sfWidgetFormInputHidden(),
      'character' => new sfWidgetFormInputText(),
      'job'       => new sfWidgetFormInputText(),
      'mount'     => new sfWidgetFormInputText(),
      'pvp'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'level'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('level')), 'empty_value' => $this->getObject()->get('level'), 'required' => false)),
      'character' => new sfValidatorInteger(),
      'job'       => new sfValidatorInteger(),
      'mount'     => new sfValidatorInteger(),
      'pvp'       => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('exp[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Exp';
  }

}
