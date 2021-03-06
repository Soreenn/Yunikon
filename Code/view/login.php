<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>
<div id="content-wrap">
	<section>
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h2 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Connectez-vous à l'espace client !</h2>
					<form method="POST" action="/loginRequest">
						<div class="form-group form-group-lg">
							<label for="email"></label>
							<b>Email</b>
							<input class="form-control" type="text" name="email" id="email">
						</div>
						<div class="form-group form-group-lg">
							<label for="password"></label>
							<b>Mot de passe</b>
							<input class="form-control" type="password" name="password" id="password">
							<div class="text-danger">
								<?= $errorLogin ?>
							</div>
						</div>
						<input type="reset" value="Effacer" class="button-leweb">
						<input type="submit" value="Connexion" class="button-leweb">
						<br>
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Mot de passe oublié ? <a href="/forgotPassword">Restaurer</a></small>
						<br>
						<small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Pas encore de compte ? <a href="/register">Créez un compte !</a></small>
					</form>
				</div>
			</div>
		</div>
	</section>
</div>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>