<?php

/**
 * sfWidgetFormAssetInput
 *
 * @package    symfony
 * @subpackage widget
 * @author     Massimiliano Arione <garakkio@gmail.com>
 */
class sfWidgetFormAssetInput extends sfWidgetFormInput
{
  /**
   * Constructor.
   *
   * Available options:
   *
   *  * asset_type: The asset type ('all' for all types)
   *  * form_name: The form name (javascript based by default)
   *
   * @param array $options     An array of options
   * @param array $attributes  An array of default HTML attributes
   * @see sfWidgetFormInput
   */
  protected function configure($options = array(), $attributes = array())
  {
    parent::configure($options, $attributes);
    $this->addOption('asset_type', 'image');
    $this->addOption('form_name', 'this.previousSibling.previousSibling.form.name');
  }

  /**
   * @param  string $name        The element name
   * @param  string $value       The value displayed in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetFormInput
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    return parent::render($name, $value, $attributes, $errors) . '&nbsp;' .
      image_tag('/sfAssetsLibraryPlugin/images/folder_open', array(
        'alt' => __('Insert Image'),
        'style' => 'cursor: pointer; vertical-align: middle',
        'onclick' => "
          initialDir = document.getElementById('".$this->generateId($name)."').value.replace(/\/[^\/]*$/, '');
          if(!initialDir) initialDir = '".sfConfig::get('app_sfAssetsLibrary_upload_dir', 'media')."';
          sfAssetsLibrary.openWindow({
            form_name: ".$this->getOption('form_name').",
            field_name: '".$name."',
            type: '".$this->getOption('asset_type')."',
            url: '".url_for('@sf_asset_library_list?dir=PLACEHOLDER')."?popup=2'.replace('PLACEHOLDER', initialDir),
            scrollbars: 'yes'
          });"
      ));
  }

  /**
   * Gets the JavaScript paths associated with the widget.
   *
   * @return array An array of JavaScript paths
   */
  public function getJavascripts()
  {
    return array('/sfAssetsLibraryPlugin/js/main');
  }

}
