<div id="right_column_advice_wrapper">
                  <div id="advice_wrapper">
<div id="advice_upper_slicer"></div>

<!--tutaj znajduje się górana cześć tj tytuł, autor, krótki opis-->
<div id="advice_heading_wrapper">

<!-- lewa czesc naglowka, tj tytul, opis porady-->
<div id="left_part_advice_head">
<h1 id="advice_tittle"><?php echo $advice->getTitle() ?></h1>
<h2 id="desc_short_text">Opis porady</h2>

<div class="short_desc_wrapper">

<div id="short_desc_heading"></div>
<div id="short_desc_content">
<!--tutaj zawierać sie bedzie krotki opis-->
<?php echo $advice->getDescription() ?></div>
<div id="short_desc_bottom"></div>

</div>

</div>


<!-- prawa czesc, zawiera tytyl, data oraz uzytkownika-->
<div id="right_part_advice_head">
<div id="level_text">Poziom: <h4><?php echo $advice->getLevel() ?></h4></div>

<div id="author_advice">Data: <h4>22.03.2008</h4></div>
<div id="author_advice">Autor: <h4><?php echo $author->getUserName() ?></h4></div>
</div>
<img alt="my_pic" style="padding-top:7px" src="/uploads/user_picture.jpeg" height="100" width="100"/>
<!--czysci floata-->
<div id="adivice_head_cleaner"></div>

</div>



<!-- tutaj znajduje się w cześć w ktorej jest instrukcja oraz tego co potrzebujesz do wykonania-->
<div id="advice_insturction_wrapper">
<h2 id="instruction_text">Instrukcja</h2>
<div id="instruction_header_slice"></div>

<div class="advice_instruction_content"><!--tutaj sa 2 plywajace-->
<div id="instruction_left_side">
  <?php echo $advice->getInstruction() ?>
</div>

<div id="instruction_right_side">
<div id="instruction_need_head"></div>
<div id="instruction_need_content"><!--co potrzebuje wysweietla-->
  <p>I miotly</p>
  <p>II myszki oblizanej</p>
  <p>III laleczki czaki</p>
  <p>IV Mamani<br />
    V paluszka<br />
    VI fajeda<br />
  </p>
</div>
<div id="instruction_need_bottom"></div>

</div>

<div style="clear:both"></div>

</div>
<div id="instruction_bottom"></div>
</div>

<div id="advice_bootom_slicer"></div>
</div>


                  </div>