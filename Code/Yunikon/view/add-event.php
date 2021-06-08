<?php
ob_start();
$title = "Home";
$currentPage = "#home";
?>
<!-- HEADER -->
<div  id="!content-wrap">
	<section id="header" style="background: url(view/content/images/44755.jpg) no-repeat center center;">
		<div class="container">
			<div class="row text-center ">
				<div class="col-md-8 col-sm-6 ">
					<img class="logo" src="/view/content/images/Logo/Small-logo.png">
					<h1 class="white-text">Inscrivez votre propre evenement</h1>
					<h3 class="white-text">1ère édition 2021 au 2M2C de Montreux</h3>
					<br><br><br>
					<h1 class="white-text" id="headline">Communiquer à la comunauté pop culture l'arivée de votre evenement</h1>
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

	<section id="home" style="margin-bottom:100px;">
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2" style="margin-top:70px; "> 
					<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Inscrivez votre evenement gratuitement</h1>
					<form method="POST" action="/registerEvent" enctype="multipart/form-data">
						<div class="form-group form-group-sm">
							<label for="name"></label>
							<b>Nom</b>
							<input class="form-control" type="text" name="addName" id="addName" required>
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Donnez un nom à votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="startingDate"></label>
							<b>Date de début</b>
							<input class="form-control" type="date" name="addStarting" id="addStarting" required>
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">quand débutera votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="endingDate"></label>
							<b>Date de fin</b>
							<input class="form-control" type="date" name="addEnding" id="addEnding" required>
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Quand se terminera votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="location"></label>
							<b>Lieu</b>
							<input class="form-control" type="text" name="addLocation" id="addLocation" required>
							<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Où aura lieu votre événement</small>
						</div>
						<div class="form-group form-group-sm">
							<label for="description"></label>
							<b>Description</b>
							<textarea class="form-control" type="text" name="addDescription" id="addDescription"></textarea> 
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