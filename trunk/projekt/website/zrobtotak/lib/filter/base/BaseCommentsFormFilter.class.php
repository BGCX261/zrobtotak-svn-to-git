<?php

/**
 * Comments filter form base class.
 *
 * @package    zrobtotak.pl
 * @subpackage filter
 * @author     Marek Synoradzki
 */
abstract class BaseCommentsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'text'       => new sfWidgetFormFilterInput(),
      'rating'     => new sfWidgetFormFilterInput(),
      'advice_id'  => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => true)),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'text'       => new sfValidatorPass(array('required' => false)),
      'rating'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'advice_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Advice', 'column' => 'id')),
      'user_id'    => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('comments_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Comments';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'created_at' => 'Date',
      'text'       => 'Text',
      'rating'     => 'Number',
      'advice_id'  => 'ForeignKey',
      'user_id'    => 'ForeignKey',
    );
  }
}
