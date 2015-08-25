<?php

/**
 * Tags filter form base class.
 *
 * @package    zrobtotak.pl
 * @subpackage filter
 * @author     Marek Synoradzki
 */
abstract class BaseTagsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'names'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'advice_id' => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'names'     => new sfValidatorPass(array('required' => false)),
      'advice_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Advice', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('tags_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tags';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'names'     => 'Text',
      'advice_id' => 'ForeignKey',
    );
  }
}
