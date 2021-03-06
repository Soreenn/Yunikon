<?php
ob_start();
$title = "Register";
$currentPage = "#register";
?>

<section id="!warp-content">
	<div class="container ">
		<div class="row text-center">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Inscrivez-vous à Yunikon gratuitement !</h2>
				<form method="POST" action="/registerRequest">
				<div class="text-danger">
								<?=$errorRegister ?>
							</div>
					<div class="form-group form-group-sm">
						<label for="lastname"></label>
						<b>Nom</b>
						<input class="form-control" type="text" name="lastname" id="lastname">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre nom restera privé.</small>
					</div>
					<div class="form-group form-group-sm">
						<label for="firstname"></label>
						<b>Prénom</b>
						<input class="form-control" type="text" name="firstname" id="firstname">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre prénom restera privé.</small>
					</div>
					<div class="form-group form-group-sm">
						<label for="email"></label>
						<b>Email</b>
						<input class="form-control" type="email" name="email" id="email">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre email restera privé.</small>
					</div>
					<div class="form-group form-group-sm">
						<label for="phone"></label>
						<b>Téléphone</b>
						<input class="form-control" type="number" name="phone" id="phone" Required>
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre numéro restera privé.</small>
					</div>
					<div class="form-group form-group-sm">
						<label for="password"></label>
						<b>Mot de passe</b>
						<input class="form-control" type="password" name="password" id="password">
					</div>
					<div class="form-group form-group-sm">
						<label for="passwordConfirm"></label>
						<b>Confirmez le mot de passe</b>
						<input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm">
					</div>
					<br>
					<input type="submit" value="Je m'inscris dès maintenant!" class="button-leweb">
					<br>
					<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Déjà un compte ? <a href="/login">Connectez-vous !</a></small>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>