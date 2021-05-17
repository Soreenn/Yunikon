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
						<form>
						<div class="form-group form-group-lg">
						<label for="email">Email</label>
						<input class="form-control" type="text" name="email" id="email">
						</div>
						<div class="form-group form-group-lg">
						<label for="password">Mot de passe</label>
						<input class="form-control" type="text" name="password" id="password">
						</div>
						<button class="button-leweb">Effacer</button>
						<button class="button-leweb">Connexion</button>
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