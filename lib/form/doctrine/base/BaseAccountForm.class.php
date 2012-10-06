<?php

/**
 * Account form base class.
 *
 * @method Account getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAccountForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'username'  => new sfWidgetFormInputText(),
      'pseudo'    => new sfWidgetFormInputText(),
      'password'  => new sfWidgetFormInputText(),
      'mail'      => new sfWidgetFormInputText(),
      'question'  => new sfWidgetFormTextarea(),
      'reponse'   => new sfWidgetFormTextarea(),
      'gmlevel'   => new sfWidgetFormInputText(),
      'banned'    => new sfWidgetFormInputText(),
      'points'    => new sfWidgetFormInputText(),
      'timestamp' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'username'  => new sfValidatorString(array('max_length' => 255)),
      'pseudo'    => new sfValidatorString(array('max_length' => 255)),
      'password'  => new sfValidatorString(array('max_length' => 255)),
      'mail'      => new sfValidatorString(array('max_length' => 100)),
      'question'  => new sfValidatorString(),
      'reponse'   => new sfValidatorString(),
      'gmlevel'   => new sfValidatorInteger(),
      'banned'    => new sfValidatorInteger(),
      'points'    => new sfValidatorInteger(),
      'timestamp' => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('account[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }

}
