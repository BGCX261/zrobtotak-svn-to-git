<?php use_helper('sfAsset') ?>
<div class="assetImage">
  <div class="thumbnails">
    <?php echo link_to_asset_action(asset_image_tag($sf_asset, 'small', array('width' => 84), isset($folder) ? $folder->getRelativePath() : null), $sf_asset) ?>
  </div>

  <div class="assetComment">
    <?php echo auto_wrap_text($sf_asset->getFilename()) ?>
    <div class="details">
      <?php echo $sf_asset->getFilesize() ?> KiB
      <?php if (!$sf_user->hasAttribute('popup', 'sf_admin/sf_asset/navigation')): ?>
        <?php echo link_to(image_tag('/sfAssetsLibraryPlugin/images/delete.png', 'alt=delete class=deleteImage align=top'), '@sf_asset_library_delete_asset?id='.$sf_asset->getId(), array('title' => __('Delete'), 'confirm' => __('Are you sure?'))) ?>
      <?php endif ?>
    </div>
  </div>
</div>
