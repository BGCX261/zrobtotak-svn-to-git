<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>

    </head>
    <body>
        <div id="wrapper">
            <div id="container">



                <div id="precontent">



                    <!-- gorny kontener zawierajacy logo oraz formularze logowania, wyszukiwnia-->
                    <div id="header_cont">

                        <!--Lewa gorna czesc, strona glonwa, logo, oraz logo, poprawienie zwalidowana-->
                        <div id="header">

         
                            <a href="<?php echo url_for('@homepage')?>">Strona Główna</a> | <a href="#"><strong>Pomoc</strong></a>
                            <h1 id="logo">
                                <a title="ZrobToTak- portal pełen pomysłów" href="<?php echo url_for('@homepage')?>">zróbTOtak.pl</a>
                            </h1>
                        </div>
                        <!--koniec lewej gornej czesci tj logo++-->




                        <!--Gorny blok, logowanie, wszukiwanie -->
                        <div id="register">
                            <?php if (!$sf_user->isAuthenticated()): ?>

                            <form action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                                <fieldset>
                                    <label for="login"  class="f">Login:</label><input type="text" id="login" name="signin[username]"/> <label for="pass" class="f">Hasło:</label>
                                    <input type="password" id="pass" name="signin[password]" />
                                    <input id="signin_remember" type="hidden" name="signin[remember]"/>
                      
                                    <button type="submit">zaloguj się</button>
                                </fieldset>
                            </form>

                            <p>
                                Nowy użytkownik? <a href="<?php echo url_for('@register_form') ?>">Załóż konto</a>
                            </p>
                            <?php endif;?>
                            <?php if ($sf_user->isAuthenticated()): ?>
                             <p>
                                Witaj <?php echo $sf_user->getUsername() ?>
                                <?php echo $sf_user->getProfile()->getLastName() ?>

                                <a style="text-decoration: none" href="<?php echo url_for('@sf_guard_signout') ?>"><strong style="font-size: 9px; color: red; font-weight: bold; text-decoration: none">Wyloguj się</strong></a>
                            </p>
                            <?php endif;?>

                            <form class="search" action="#" method="get">
                                <fieldset>
                                    <label for="search">Szukaj:</label><input type="text" id="search" name="query" value=""/> <button type="submit">szukaj</button>  <em>Aktualnie znajdziesz u nas <strong>111 porad</strong> i <strong>22 użytkowników</strong></em>                     </fieldset>
                            </form>
                        </div>
                        <!-- konczy sie gorna czesc: tj logowanie, wyszukiwanie-->





                    </div>
                    <!-- koniec calej gornej czesc-->



                    <!--tutaj nalezy zapuszczac skrypty w symfony-->

                        <?php echo $sf_content ?>
                    <!--tutaj juz nie bedziemy zapuszczac skryptow w symfony-->



                </div>


                <!-- TOtaj konczy sie prekontent-->








                <!--dolne menu wraz z pomoca, ma gorny margines 30px-->
                <div id="short_menu">
                    <a class="help" href="#">Pomoc</a>
                    <ul>
                        <li>
                            <a href="#">Strona główna</a>
                        </li>

                        <li>|</li>
                        <li>
                            <a href="#">Czytaj porady</a>
                        </li>

                        <li>|</li>
                        <li>
                            <a href="#">RSS</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">Dodaj poradę</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">Dołącz do nas</a>
                        </li>
                        <li>|</li>
                        <li>
                            <a href="#">Zgłoś problem</a></li>
                        <li>|</li>
                        <li>
                            <a href="#">Regulamin</a></li>
                        <li>|</li>
                        <li>
                            <a href="#">FAQ</a></li>


                    </ul>
                </div>
                <!--koniec dolnego menu-->


            </div></div>

        <!--do tego komemntu jest wraper -->



        <!-- caly blok trzymajacy zbior blokow w jednej calosci-->
        <div id="footer_holder">


            <!--menu typu kategorie, uzytkonicy itd... wszystko wszystepuje w postaci list ul, li-->
            <div id="footer_up">
                <div style="overflow: hidden;">
                    <ul>
                        <li>
                            <h5>
                                Kategorie zróbTOtak.pl:
                            </h5>
                        </li>
                        <li>
                            <a href="#">Muzyka</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">Sport</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">Kulinaria</a>
                        </li><li>|</li>
                        <li>
                            <a href="bron-i-militaria">Motoryzacja</a>
                        </li><li>|</li>

                        <li>
                            <a class="all" href="kategorie">wszystkie kategorie</a>
                        </li>
                    </ul> 				                  <ul class="brd">
                        <li>
                            <h5>Użytkownicy:
                            </h5>
                        </li>
                        <li>
                            <a href="#">Tomeo_22</a>
                        </li><li>|</li>
                        <li>
                            <a href="">Marco</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">Ziaja</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">Jacoo</a>
                        </li><li>|</li>

                        <li>
                            <a class="all" href="marki">więcej użytkowników</a>
                        </li>
                    </ul>

                    <ul class="brd">
                        <li>
                            <h5>Linki:
                            </h5>
                        </li>
                        <li>
                            <a href="#">pwr</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">wiadomości</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">poczta</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">pogoda</a>
                        </li><li>|</li>
                        <li>
                            <a href="#">aukcje</a>
                        </li>
                        <li>|</li>
                        <li><a href="#" title="gry online">gry</a></li>
                        <li>|</li>
                        <li><a href="#" title="moda">moda</a></li>
                        <li>|</li>
                        <li><a href="#" title="randki">randki</a></li>
                    </ul>
                </div>


            </div>
            <!---koniec menu typu kategorie, uzytkownicy-->


            <!--dolna stopka informujaca o prawach autorskich itd..-->
            <div id="footer_down">
                <div class="warning">
                    <p>
                        Tutaj cos bedzie</p>
                </div>

                <p class="bold">
                    Copyright © <strong>ZróbToTak.pl<br />
                    </strong></p>
                <p class="bold">&nbsp;</p>
                <p></p>


            </div>
            <!--koniec stopki -->


        </div>
        <!--koniec calego dolu-->

    </body>
</html>
