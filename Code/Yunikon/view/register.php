<?php
ob_start();
$title = "Register";
$currentPage = "#register";
?>

<section id="register">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Inscrivez-vous à Yunikon gratuitement !</h1>
						<form>
						<div class="form-group form-group-sm">
						<label for="lastname">Nom</label>
						<input class="form-control" type="text" name="lastname" id="lastname">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre nom restera privé.</small>
						</div>
						<div class="form-group form-group-sm">
						<label for="firstname">Prénom</label>
						<input class="form-control" type="text" name="firstname" id="firstname">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre prénom restera privé.</small>
						</div>
						<div class="form-group form-group-sm">
						<label for="name">Nom affiché</label>
						<input class="form-control" type="text" name="name" id="name">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Nom qui sera affiché.</small>
						</div>
						<div class="form-group form-group-sm">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" id="email">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre email restera privé.</small>
						</div>
						<div class="form-group form-group-sm">
						<label for="phone">Téléphone</label>
						<input class="form-control" type="number" name="phone" id="phone">
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre numéro restera privé.</small>
						</div>
						<div class="form-group form-group-sm">
						<label for="password">Mot de passe</label>
						<input class="form-control" type="password" name="password" id="password">
						</div>
						<div class="form-group form-group-sm">
						<label for="passwordConfirm">Confirmez le mot de passe</label>
						<input class="form-control" type="passwordConfirm" name="passwordConfirm" id="passwordConfirm">
						</div>
						<br>
						<button data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" class="button-leweb">Je m'incris dès maintenant !</button>
						<br>
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Déjà un compte ? Connectez-vous !</small>
						</form>
					</div>
				</div>
  </div>
		</section>

        <?php
$content = ob_get_clean();
require "view/gabarit.php";
?>