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
				<div class="col-sm-8 col-sm-offset-2">
					<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Inscrivez votre evenement gratuitement</h1>
					<form method="POST" action="/registerEvent">
						<div class="form-group form-group-sm">
							<label for="name"></label>
							<b>Nom</b>
							<input class="form-control" type="text" name="addName" id="addName">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Donnez un nom à votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="startingDate"></label>
							<b>Date de début</b>
							<input class="form-control" type="text" name="addStarting" id="addStarting">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">quand débutera votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="endingDate"></label>
							<b>Date de fin</b>
							<input class="form-control" type="text" name="addEnding" id="addEnding">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Quand se terminera votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="location"></label>
							<b>Lieu</b>
							<input class="form-control" type="text" name="addLocation" id="addLocation">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Où aura lieu votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="description"></label>
							<b>Desciprtion</b>
							<input class="form-control" type="password" name="addDescription" id="addDescription">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Décrivez brievement votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="image"></label>
							<b>image</b>
							<input class="form-control" type="file" name="addImage" id="addImage">
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Donnez une image qui présentera votre événement</small>
						</div>
						<input type="submit" value="Créer l'événement" class="button-leweb">
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php
	$content = ob_get_clean();
	require "view/gabarit.php";
	?>