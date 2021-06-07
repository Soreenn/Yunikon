<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>

<!-- HEADER -->
<section id="traitre">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-8">
                <img class="logo" src="/view/content/images/15_logoPolymanga.png">
                <h1 class="white-text">Polymanga 2021</h1>
                <h3 class="white-text">16ème édition 2021 au 2M2C de Montreux</h3>
                <br><br><br>
                <h1 class="white-text" id="headline">Pop culture is good</h1>
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
                        <img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/maxresdefault1.jpg">
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/unnamed.jpg">
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/Capture.jpg">
                    </div>
                     <div class="col-md-4 col-md-offset-4">
                        <img class="banner" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/Fukumi-Convention-Stand-1024x769.jpg">
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