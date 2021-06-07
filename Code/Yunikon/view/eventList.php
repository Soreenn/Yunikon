<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>

<!-- HEADER -->
<section id="pinceau">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8">
                <img class="logo" src="/view/content/images/Logo/Small-logo.png">
                <h1 class="white-text">L'univers Pop Culture</h1>
                <h3 class="white-text">1ère édition 2021 au 2M2C de Montreux</h3>
                <br><br><br>
                <h1 class="white-text" id="headline">1ère édition Yunikon!</h1>
                <div class="countdown-1" data-countdown>
                    <div class="days white-text">
                        <span class="amount"></span>
                        <span class="labelTime"></span>
                    </div>
                    <div class="hours white-text">
                        <span class="amount"></span>
                        <span class="labelTime"></span>
                    </div>
                    <div class="minutes white-text">
                        <span class="amount"></span>
                        <span class="labelTime"></span>
                    </div>
                    <div class="seconds white-text">
                        <span class="amount"></span>
                        <span class="labelTime"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="animation">
        <a class="arrow-down-animation" data-scroll href="#homeEvent"><i class="fa fa-angle-down"></i></a>
    </div>
</section>
<!-- HEADER ENDS -->

<div id="content-wrap">
    <section id="homeEvent">
        <div>
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                        <a href="/event"><img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/venez-feter-les-4-ans-de-gaijin-dash-au-festival-polymanga-2019-e8917c51__1920_1080__0-438-1280-849.jpg">
                    </div>  
                    <div class="col-md-4 col-md-offset-4">
                    <a href="/event"><img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/Paris-Games-Week-2020-Annulation.jpg">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                    <a href="/event"><img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/Japan_Expo_Logo_2.svg.png">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                    <a href="/event"><img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/987b2cc3315d480aa390dc683f43e3b5f96814b5.jpg">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>