<?php
ob_start();
$title = "Home";
$currentPage = "#home";
?>
<!-- HEADER -->
<section id="header">
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
			<a class="arrow-down-animation" data-scroll href=<?=$currentPage?>><i class="fa fa-angle-down"></i></a>
			</div>
		</section>
	<!-- HEADER ENDS -->

<section id="home">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 col-md-offset-2">
						<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Ouverture de la 1ère édition de Yunikon !</h1>
						<h5 data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Inscriptions ouvertes dès maintenant</h5>
						<br>
						<h2 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Participez à la Yunikon 2021 et à bien d'autres événements !</h1>
						<br>
						<button data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" class="button-leweb">Je m'incris dès maintenant !</button>
						<br>
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Déjà un compte ? Connectez-vous !</small>
					</div>
				</div>
  </div>
		</section>

        <?php
$content = ob_get_clean();
require "view/gabarit.php";
?>