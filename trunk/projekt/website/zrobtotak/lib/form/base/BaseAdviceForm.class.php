<?php

/**
 * Advice form base class.
 *
 * @method Advice getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseAdviceForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                     => new sfWidgetFormInputHidden(),
      'slug'                   => new sfWidgetFormInputText(),
      'rating'                 => new sfWidgetFormInputText(),
      'description'            => new sfWidgetFormTextarea(),
      'instruction'            => new sfWidgetFormTextarea(),
      'created_at'             => new sfWidgetFormDateTime(),
      'active'                 => new sfWidgetFormInputCheckbox(),
      'movie'                  => new sfWidgetFormInputText(),
      'level'                  => new sfWidgetFormInputText(),
      'visited'                => new sfWidgetFormInputText(),
      'title'                  => new sfWidgetFormInputText(),
      'category_id'            => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true)),
      'category_upcategory_id' => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true, 'key_method' => 'getCategoryupId')),
      'user_id'                => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'                     => new sfValidatorPropelChoice(array('model' => 'Advice', 'column' => 'id', 'required' => false)),
      'slug'                   => new sfValidatorString(array('max_length' => 400)),
      'rating'                 => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'description'            => new sfValidatorString(array('required' => false)),
      'instruction'            => new sfValidatorString(array('required' => false)),
      'created_at'             => new sfValidatorDateTime(array('required' => false)),
      'active'                 => new sfValidatorBoolean(array('required' => false)),
      'movie'                  => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'level'                  => new sfValidatorInteger(array('min' => -32768, 'max' => 32767, 'required' => false)),
      'visited'                => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'title'                  => new sfValidatorString(array('max_length' => 400)),
      'category_id'            => new sfValidatorPropelChoice(array('model' => 'Categories', 'column' => 'id', 'required' => false)),
      'category_upcategory_id' => new sfValidatorPropelChoice(array('model' => 'Categories', 'column' => 'categoryup_id', 'required' => false)),
      'user_id'                => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('advice[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advice';
  }


}
