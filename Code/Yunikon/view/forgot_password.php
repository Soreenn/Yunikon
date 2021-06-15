<?php
ob_start();
$title = "Mot de passe oublié";
?>
<div id="content-wrap">
	<section id="login">
		<div class="container center_div">
			<div class="row text-center">
				<div class="col-sm-8 col-sm-offset-2">
					<h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Assistance de mot de passe oublié</h1>
					<form method="POST" action="/getToken">
					<div class="form-group form-group-lg">
							<label for="email"></label>
							<b>Email</b>
							<input class="form-control" type="text" name="email" id="email">
							<div class="text-danger">
								<?= $errorToken ?>
							</div>
						</div>
						<input type="reset" value="Effacer" class="button-leweb">
						<input type="submit" value="Get token" class="button-leweb">
						<br>
						<br>
					</form>
					
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
							<div class="text-danger">
								<?= $errorForgot ?>
							</div>
						</div>
						<input type="reset" value="Effacer" class="button-leweb">
						<input type="submit" value="Changer" class="button-leweb">
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