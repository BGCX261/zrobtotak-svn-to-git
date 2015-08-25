<div class="main_container_wrapper">

    <div id="all_left_site_part">
        <?php
        //array('categoryId' => $categoryId)
        ?>
        <?php include_component('advice','displayMenu') ?>
    </div>

    <div id="all_middle_site_part">
    <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
    <table>
    <?php echo $form ?>
  </table>

  <input type="submit" value="Zaloguj się" />
</form>
    </div>
 <div style="clear:both" class="clear_after_flow"></div>

             </div>