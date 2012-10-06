<?php

/**
 * Map form base class.
 *
 * @method Map getObject() Returns the current form's model object
 *
 * @package    DGuardCMS
 * @subpackage form
 * @author     Andaeriel
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMapForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'width'          => new sfWidgetFormInputText(),
      'height'         => new sfWidgetFormInputText(),
      'mapdata'        => new sfWidgetFormTextarea(),
      'decryptkey'     => new sfWidgetFormTextarea(),
      'createtime'     => new sfWidgetFormTextarea(),
      'monsters'       => new sfWidgetFormTextarea(),
      'maximummonster' => new sfWidgetFormInputText(),
      'maximumgroup'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'width'          => new sfValidatorInteger(array('required' => false)),
      'height'         => new sfValidatorInteger(array('required' => false)),
      'mapdata'        => new sfValidatorString(array('required' => false)),
      'decryptkey'     => new sfValidatorString(array('required' => false)),
      'createtime'     => new sfValidatorString(array('required' => false)),
      'monsters'       => new sfValidatorString(),
      'maximummonster' => new sfValidatorInteger(),
      'maximumgroup'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('map[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Map';
  }

}
