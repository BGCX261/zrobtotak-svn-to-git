<?php

/**
 * Tags form base class.
 *
 * @method Tags getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseTagsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'names'     => new sfWidgetFormInputText(),
      'advice_id' => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorPropelChoice(array('model' => 'Tags', 'column' => 'id', 'required' => false)),
      'names'     => new sfValidatorString(array('max_length' => 255)),
      'advice_id' => new sfValidatorPropelChoice(array('model' => 'Advice', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tags';
  }


}
