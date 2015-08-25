<?php

/**
 * Categories form base class.
 *
 * @method Categories getObject() Returns the current form's model object
 *
 * @package    zrobtotak.pl
 * @subpackage form
 * @author     Marek Synoradzki
 */
abstract class BaseCategoriesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'image'         => new sfWidgetFormInputText(),
      'categoryup_id' => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorPropelChoice(array('model' => 'Categories', 'column' => 'id', 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'slug'          => new sfValidatorString(array('max_length' => 255)),
      'description'   => new sfValidatorString(array('required' => false)),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'categoryup_id' => new sfValidatorPropelChoice(array('model' => 'Categories', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Categories', 'column' => array('name'))),
        new sfValidatorPropelUnique(array('model' => 'Categories', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('categories[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categories';
  }


}
