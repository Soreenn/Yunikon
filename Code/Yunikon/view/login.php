<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>

<section id="login">
			<div class="container center_div">
				<div class="row text-center">
					<div class="col-sm-8 col-sm-offset-2">
						<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Connectez-vous à l'espace client !</h1>
						<form method="POST" action="/loginRequest">
						<div class="form-group form-group-lg">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" id="email">
						</div>
						<div class="form-group form-group-lg">
						<label for="password">Mot de passe</label>
						<input class="form-control" type="password" name="password" id="password">
						</div>
						<input type="reset" value="Effacer" class="button-leweb">
						<input type="submit" value="Connexion" class="button-leweb">
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