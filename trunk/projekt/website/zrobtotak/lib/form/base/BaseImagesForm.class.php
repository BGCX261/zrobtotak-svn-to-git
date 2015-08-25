<?php

/**
 * Images form base class.
 *
 * @method Images getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseImagesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'url'       => new sfWidgetFormInputText(),
      'text'      => new sfWidgetFormInputText(),
      'advice_id' => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Images', 'column' => 'id', 'required' => false)),
      'url'       => new sfValidatorString(array('max_length' => 255)),
      'text'      => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'advice_id' => new sfValidatorPropelChoice(array('model' => 'Advice', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('images[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Images';
  }


}
