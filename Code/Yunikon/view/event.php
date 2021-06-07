<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>

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
    <div id="content-wrap">
    <section id="homeEvent">
    <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HHhyHCzVdFHMSA" async> </script> </form>
    </section>
    <div<
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>