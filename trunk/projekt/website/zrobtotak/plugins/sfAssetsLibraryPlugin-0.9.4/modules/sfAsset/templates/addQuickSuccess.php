<?php use_stylesheet('/sf/sf_admin/css/main') ?>
<?php use_helper('I18N') ?>

<h1><?php echo __('Upload a file here', null, 'sfAsset') ?></h1>

<?php include_partial('sfAsset/edit_header', array('sf_asset' => $sf_asset)) ?>

<div id="sf_asset_container">
  <?php include_partial('sfAsset/messages', array('sf_asset' => $sf_asset)) ?>
  <?php include_partial('sfAsset/edit_form', array('sf_asset' => $sf_asset, 'form' => $form)) ?>
</div>

<?php include_partial('sfAsset/edit_footer', array('sf_asset' => $sf_asset)) ?>