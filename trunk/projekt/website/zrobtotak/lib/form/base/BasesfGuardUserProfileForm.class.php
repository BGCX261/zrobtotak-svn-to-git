<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @method sfGuardUserProfile getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BasesfGuardUserProfileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'first_name' => new sfWidgetFormInputText(),
      'last_name'  => new sfWidgetFormInputText(),
      'birthday'   => new sfWidgetFormDate(),
      'email'      => new sfWidgetFormInputText(),
      'city'       => new sfWidgetFormInputText(),
      'image'      => new sfWidgetFormInputText(),
      'descrypt'   => new sfWidgetFormTextarea(),
      'level'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'first_name' => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 20, 'required' => false)),
      'birthday'   => new sfValidatorDate(array('required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'city'       => new sfValidatorString(array('max_length' => 30, 'required' => false)),
      'image'      => new sfValidatorString(array('max_length' => 40, 'required' => false)),
      'descrypt'   => new sfValidatorString(array('required' => false)),
      'level'      => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }


}
