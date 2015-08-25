<?php

/**
 * News form base class.
 *
 * @method News getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseNewsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'title'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'text_des'   => new sfWidgetFormTextarea(),
      'image'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'News', 'column' => 'id', 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 400, 'required' => false)),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'text_des'   => new sfValidatorString(array('required' => false)),
      'image'      => new sfValidatorString(array('max_length' => 400, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('news[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'News';
  }


}
