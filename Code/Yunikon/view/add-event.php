<?php
ob_start();
$title = "Home";
$currentPage = "#home";
?>
<!-- HEADER -->
<div id="!content-wrap">
	<section id="headerEvent">
		<div class="container">
			<div class="row text-center">
				<div class="col-md-8">
					<img class="logo" src="/view/content/images/Logo/Small-logo.png">
					<h1 class="white-text">Inscrivez votre propre evenement</h1>
					<br>
					<br>
					<br>
					<h2 class="white-text" id="headline">Communiquer à la comunauté pop culture l'arivée de votre evenement</h2>
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
			<div class="row text-center">
					

			</div>
		</div>
	</section>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>