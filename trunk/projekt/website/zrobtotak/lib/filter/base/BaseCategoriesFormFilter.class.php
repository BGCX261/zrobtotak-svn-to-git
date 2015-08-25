<?php

/**
 * Categories filter form base class.
 *
 * @package    zrobtotak.pl
 * @subpackage filter
 * @author     Marek Synoradzki
 */
abstract class BaseCategoriesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'   => new sfWidgetFormFilterInput(),
      'image'         => new sfWidgetFormFilterInput(),
      'categoryup_id' => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'name'          => new sfValidatorPass(array('required' => false)),
      'slug'          => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'image'         => new sfValidatorPass(array('required' => false)),
      'categoryup_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categories', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('categories_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Categories';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'name'          => 'Text',
      'slug'          => 'Text',
      'description'   => 'Text',
      'image'         => 'Text',
      'categoryup_id' => 'ForeignKey',
    );
  }
}
