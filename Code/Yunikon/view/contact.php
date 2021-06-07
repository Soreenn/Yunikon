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

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>