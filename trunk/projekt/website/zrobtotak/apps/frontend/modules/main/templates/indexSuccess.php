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
        <?php include_partial('navbutton') ?>
        <!--koniec punktu startowego-->



        <div id="news_container">
            <div id="news_heading"> <h1 id="news_headingH1">Aktualności</h1></div>

            <div id="news_content">

                <div id="news_left_content">
                    <div id="picture"><img src="images/news/test_images.jpg"/></div>
                    <div id="text_under_picture">
                        <h3 id="text_under_pic_h3"><a href="">Uczniom należy zapewnić możliwość dalszego kształcenia </a></h3>
                        <div class="data_under_picture">22 kwietnia 2002</div>
                        <div id="clear_text">
                            W przypadku likwidacji warsztatów szkolnych jednostki samorządu terytorialnego mają obowiązek zapewnić korzystającym z ich usług dalszą możliwość zdobywania umiejętności praktycznych — pisze dzisiejsza Rzeczpospolita
                        </div>

                    </div>
                </div>
                <div id="news_right_content">

                    <ul>
                        <li class="underline"><a href="">Co nowego slychac w naszym pięknym świecie.</a><div class="data">22 kwietnia 2010</div></li>

                        <li class="none_underline"><a href="">Co nowego slychac w naszym pięknym świecie.</a><div class="data">22 kwietnia 2010</div></li>
                        <li class="none_underline"><a href="">Dzisiaj przjebałem cymbała jednego z głowki</a><div class="data">22 marzec 2003</div></li>
                        <li class="none_underline"><a href="">Ale urwał cymbał jeden nie myty</a><div class="data">22 marzec 2003</div></li>
                    </ul>

                </div>
                <div id="news_clear"></div>
            </div>


            <div id="news_bottom"> </div>
        </div>
        <!--koniec aktualnosc-->


    </div>
    <!-- koniec srodkowej czesci-->








    <!--prawa strona-->
    <div id="all_right_site_part">

        <?php include_partial('displayTopAdvice') ?>

    </div>
    <!-- koniec prawej strony-->




    <div style="clear:both" class="clear_after_flow"></div>

</div>