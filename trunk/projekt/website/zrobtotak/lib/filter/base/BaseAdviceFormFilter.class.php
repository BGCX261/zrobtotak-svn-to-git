<?php

/**
 * Advice filter form base class.
 *
 * @package    zrobtotak.pl
 * @subpackage filter
 * @author     Marek Synoradzki
 */
abstract class BaseAdviceFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'slug'                   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rating'                 => new sfWidgetFormFilterInput(),
      'description'            => new sfWidgetFormFilterInput(),
      'instruction'            => new sfWidgetFormFilterInput(),
      'created_at'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'active'                 => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'movie'                  => new sfWidgetFormFilterInput(),
      'level'                  => new sfWidgetFormFilterInput(),
      'visited'                => new sfWidgetFormFilterInput(),
      'title'                  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_id'            => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true)),
      'category_upcategory_id' => new sfWidgetFormPropelChoice(array('model' => 'Categories', 'add_empty' => true, 'key_method' => 'getCategoryupId')),
      'user_id'                => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'slug'                   => new sfValidatorPass(array('required' => false)),
      'rating'                 => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'description'            => new sfValidatorPass(array('required' => false)),
      'instruction'            => new sfValidatorPass(array('required' => false)),
      'created_at'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'active'                 => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'movie'                  => new sfValidatorPass(array('required' => false)),
      'level'                  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'visited'                => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'                  => new sfValidatorPass(array('required' => false)),
      'category_id'            => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categories', 'column' => 'id')),
      'category_upcategory_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Categories', 'column' => 'categoryup_id')),
      'user_id'                => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('advice_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Advice';
  }

  public function getFields()
  {
    return array(
      'id'                     => 'Number',
      'slug'                   => 'Text',
      'rating'                 => 'Number',
      'description'            => 'Text',
      'instruction'            => 'Text',
      'created_at'             => 'Date',
      'active'                 => 'Boolean',
      'movie'                  => 'Text',
      'level'                  => 'Number',
      'visited'                => 'Number',
      'title'                  => 'Text',
      'category_id'            => 'ForeignKey',
      'category_upcategory_id' => 'ForeignKey',
      'user_id'                => 'ForeignKey',
    );
  }
}
