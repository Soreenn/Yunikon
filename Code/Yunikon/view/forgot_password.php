<?php
ob_start();
$title = "Login";
$currentPage = "#login";
?>
<div id="content-wrap">
	<section id="login">
		<div class="container center_div">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Connectez-vous à l'espace client !</h1>
					<form method="POST" action="/forgotPasswordRequest">
					<div class="form-group form-group-lg">
							<label for="token"></label>
							<b>Token</b>
							<input class="form-control" type="text" name="token" id="token">
						</div>
						<div class="form-group form-group-lg">
							<label for="email"></label>
							<b>Email</b>
							<input class="form-control" type="text" name="email" id="email">
						</div>
						<div class="form-group form-group-lg">
							<label for="newPassword"></label>
							<b>Nouveau mot de passe</b>
							<input class="form-control" type="password" name="newPassword" id="newPassword">
						</div>
						<div class="form-group form-group-lg">
							<label for="newPasswordConfirm"></label>
							<b>Confirmer nouveau mot de passe</b>
							<input class="form-control" type="password" name="newPasswordConfirm" id="newPasswordConfirm">
						</div>
						<input type="reset" value="Effacer" class="button-leweb">
						<input type="submit" value="Connexion" class="button-leweb">
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