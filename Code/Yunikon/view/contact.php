<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>

<!-- HEADER -->
<div id="!content-wrap">
	<section id="cancerDeLaProstate">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-8">
					<img class="logo" src="/view/content/images/Logo/Small-logo.png">
					<h1 class="white-text">L'univers Pop Culture</h1>
					<h3 class="white-text">1ère édition 2021 au 2M2C de Montreux</h3>
					<br>
					<br>
					<br>
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
			<a class="arrow-down-animation" data-scroll href="#home"><i class="fa fa-angle-down"></i></a>
		</div>
	</section>
	<!-- HEADER ENDS -->
<section id="register">
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Inscrivez-vous à Yunikon gratuitement !</h1>
                <form>
                    <div class="form-group form-group-sm">
                    <b>Nom</b>
                    <input class="form-control" type="text" name="nom"> 
                    </div>

                    <div class="form-group form-group-sm">
                      <b>Email</b>
                    <input class="form-control" type="text" name="email">  
                    </div>

                    <div class="form-group form-group-sm">
                        <b>Téléphone</b>
                    <input class="form-control" type="text" name="tel">
                    </div>

                    <div class="form-group form-group-sm">
                        <b>Message</b>
                    <input class="form-control" type="text" name="message">
                    </div>

                    <div class="form-group form-group-sm">
                       <input  id="optionRadio1" type="radio" name="exposant">
                    <b >Demande de changement en compte exposant</b> 
                    <br>
                        <input  id="optionRadio2" type="radio" name="bug">
                    <b >Bug/problème</b>
                    <br>
                        <input  id="optionRadio3" type="radio" name="question">
                    <b >Question</b>
                    <br>
                        <input  id="optionRadio4" type="radio" name="autre">
                    <b >Autre</b> 
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