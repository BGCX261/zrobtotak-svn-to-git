<?php

/**
 * Images filter form base class.
 *
 * @package    zrobtotak.pl
 * @subpackage filter
 * @author     Marek Synoradzki
 */
abstract class BaseImagesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'url'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'text'      => new sfWidgetFormFilterInput(),
      'advice_id' => new sfWidgetFormPropelChoice(array('model' => 'Advice', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'url'       => new sfValidatorPass(array('required' => false)),
      'text'      => new sfValidatorPass(array('required' => false)),
      'advice_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Advice', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('images_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Images';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'url'       => 'Text',
      'text'      => 'Text',
      'advice_id' => 'ForeignKey',
    );
  }
}
