<?php
ob_start();
$title = "Contacte";
$currentPage = "#Contacte";
?>
<!-- HEADER -->
<div id="!content-wrap">
    <section id="header" style="background:url(view/content/images/contact.jpg) no-repeat center center;">
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-8 col-sm-6 ">
                    <img class="logo" src="/view/content/images/Logo/Small-logo.png">
                    <h1 class="white-text">L'univers Pop Culture</h1>
                    <h3 class="white-text">1ère édition 2021 au 2M2C de Montreux</h3>
                    <br><br><br>
                    <h1 class="white-text" id="headline">1ère édition Yunikon!</h1>
                </div>
            </div>
        </div>
		<div class="animation">
			<a class="arrow-down-animation" data-scroll href="#register"><i class="fa fa-angle-down"></i></a>
		</div>
	</section>
    <!-- HEADER ENDS -->
    <section id="register">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2" style="margin-top:60px;">
                    <h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Besoin d'aide, contactez nous !</h1>
                    <?php if(isset($_SESSION['userEmailAddress'])) : ?>
                        <form method="POST" action="/sendMail">
                    <?php else :?> 
                        <form method="POST" action="/login">
                    <?php endif;?>
                        <div class="form-group form-group-sm">
                            <b>Message</b>
                            <input class="form-control" type="text" name="message">
                        </div>
                                <div class="form-group form-group-sm" style="text-align:left;">
                                    <input id="optionRadio1" type="radio" name="subject" value="exhibitor">
                                    <b>Demande de changement en compte exposant</b>
                                    <br>
                                    <input id="optionRadio2" type="radio" name="subject" value="bug">
                                    <b>Bug/problème</b>
                                    <br>
                                    <input id="optionRadio3" type="radio" name="subject" value="question">
                                    <b>Question</b>
                                    <br>
                                    <input id="optionRadio4" type="radio" name="subject" value="other">
                                    <b>Autre</b>
                                </div>
                        <input class="button-leweb" type="submit" name="contactSubmit" value="Envoyer le Mail">
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    $content = ob_get_clean();
    require "view/gabarit.php";
    ?>