<?php

/**
 * Comments form base class.
 *
 * @method Comments getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseCommentsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'created_at' => new sfWidgetFormDateTime(),
      'text'       => new sfWidgetFormTextarea(),
      'rating'     => new sfWidgetFormInputText(),
      'advice_id'  => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => true)),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'Comments', 'column' => 'id', 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'text'       => new sfValidatorString(array('required' => false)),
      'rating'     => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'advice_id'  => new sfValidatorPropelChoice(array('model' => 'Advice', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comments[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comments';
  }


}
