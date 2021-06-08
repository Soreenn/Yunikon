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

    <div>
    <section id="puteuuuuh">
        <div class="container">
            <div class="row text-center">
                <div>
                    <div>  
                        <h2>Historique</h2>
                    </div>
                    <br>
                    <div class="col-md-8">
                        <p>Créée en 2005 sur le campus de l’École polytechnique fédérale de Lausanne par la commission de l'AGEPoly PolyJapan (d’où son nom), la convention a accueilli à cette époque plus de 6 000 visiteurs. La convention quitte l'EPFL et déménage ensuite à Palexpo à Genève où elle a accueilli 8 000 visiteurs et à partir de 2007, elle emménage dans le Palais de Beaulieu à Lausanne, David Heim, le fondateur de Polymanga refusant d'intégrer le Salon du livre. Pour l'édition 2013, la convention quitte Lausanne et déménage à Montreux au 2m2c où elle atteindra les 35 000 visiteurs. En 2018, pour sa quatorzième édition, la convention a accueilli 41 000 personnes. </p>
                    </div>
                    <form><script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_HHhyHCzVdFHMSA" async> </script> </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>