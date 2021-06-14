<?php
ob_start();
$title = "Home";
?>
<!-- HEADER -->
<div id="!content-wrap">
<div id="videoDiv" hidden style="position: absolute;">
				<video id="video" loop autoplay style="z-index: 998;">
					<source style="object-fit: fill; " src="/view/content/images/dancin.mp4">
				</video>
				</div>
	<section id="header">
	
		<div class="container">
			<div class="row text-center">
				<div class="col-md-8 col-sm-6 ">
					<img id="logoSuperSecretFeature" class="logo" src="/view/content/images/Logo/Small-logo.png">
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
			<a class="arrow-down-animation" data-scroll href="#home"><i class="fa fa-angle-down"></i></a>
		</div>
	</section>
	<!-- HEADER ENDS -->

	<section id="home">
		<div class="container">
			<div class="col-md-8 col-md-offset-2 row text-center">
				<div style="margin-top: 20%">
					<img class="" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" style="object-fit: contain; width: 100%;" src="/view/content/images/Yunikon_Banner.jpg">
					<br>
					<br>
					<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Ouverture de la 1ère édition de Yunikon !</h1>
					<h5 data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Inscriptions ouvertes dès maintenant</h5>
					<br>
					<a href="/register"><button data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" class="button-leweb">Je m'incris dès maintenant !</button></a>
					<br>
					<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Déjà un compte ? <a href="/login">Connectez-vous !</a></small>
				</div>
			</div>
		</div>
	</section>

	<!-- SUBSCRIBE -->
	<section id="subscribe">
		<div class="container">
			<div class="col-md-8  row text-center" style="width:90%;margin-left:3%;">
				<div style="margin-top: 13%">
					<h2 data-sr="enter top over 1s, wait 0.3s, move 24px, reset" class="white-text">Inscription a la Newsletter</h2>
					<h5 data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" class="white-text">Restez informés des nouvelles !</h5>
					<!-- MAILCHIMP FORM -->
					<form id="mc_form" role="form" style="object-fit: contain; width: 104%;">
						<input data-sr="enter top over 1s, wait 0.3s, move 24px, reset" type="email" class="form-control" id="mc-email" name="mc-email" placeholder="Your Email">
						<button data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" type="submit" class="button-leweb">Submit</button>
						<label for="mc-email" class="mc-email"></label>
					</form>
					<!-- MAILCHIMP FORM ENDS -->
				</div>
			</div>
		</div>
	</section>
</div>
<!-- SUBSCRIBE ENDS -->
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>