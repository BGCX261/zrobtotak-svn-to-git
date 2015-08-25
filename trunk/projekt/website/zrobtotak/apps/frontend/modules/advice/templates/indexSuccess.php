<div class="main_container_wrapper">
    <div id="all_left_site_part">
        <?php
        //array('categoryId' => $categoryId)
        ?>
        <?php include_component('advice','displayMenu') ?>
    </div>

     <!--Srodkowa czesc-->
    <div id="all_middle_site_part">

        <!--dolaczam punkt startowy-->
        <?php include_partial('main/navbutton')?>
        <!--koniec punktu startowego-->

        <!--lista porad-->

        <div id="advice_list">
<div id="adivice_list_heading">
<div id="name_head">Porada</div>
<div id="note_head">Oceny</div>
<div id="count_head">Odsłon</div>
<div id="author_head">Autor</div>

</div>

<div id="advice_list_content">
 <?php   $advices=$pager->getResults();
 foreach ($advices as $i => $myadvice): ?>

<ul class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
<li id="advice_name"><?php echo link_to($myadvice->getTitleSlug(), 'show_advice', $myadvice) ?></li>
<li id="advice_note"><?php echo $myadvice->getRating() ?></li>
<li id="advice_count"><?php echo $myadvice->getVisited() ?></li>
<li id="advice_author"><a href="">Marco</a></li>
<li style="display:block; clear:both"></li>
</ul>
<?php endforeach; ?>




<div id="paginator">

<ul id="pagination-clean">
  <li class="previous-off">&laquo; Previous</li>
  <li class="previous"><a href="?page=8">&laquo; Previous</a></li>
    <li class="active">1</li>
    <li><a href="?page=2">2</a></li>
    <li><a href="?page=3">3</a></li>
    <li><a href="?page=4">4</a></li>
    <li><a href="?page=5">5</a></li>
    <li><a href="?page=6">6</a></li>
    <li><a href="?page=7">7</a></li>
    <!--tutaj jest aktywne, musi byc link-->
    <li class="next"><a href="?page=8">Next &raquo;</a></li>
    <!--ten jest nieaktywny-->
    <li class="next-off">Next &raquo;</li>
</ul>
<div style="clear:both"></div>
</div>

</div>

<div id="advice_bottom">		</div>

</div>





        <!--koniec listy porad-->



        </div>
     <!--koniec srodkowej czesci-->


     <!--prawa strona-->
    <div id="all_right_site_part">

        <?php //include_partial('displayTopAdvice')
        ?>

    </div>
    <!-- koniec prawej strony-->




    <div style="clear:both" class="clear_after_flow"></div>

</div>
