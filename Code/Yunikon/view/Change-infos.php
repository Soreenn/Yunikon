<?php
ob_start();
$title = "Re-register";
$currentPage = "#Re-register";
?>

<section id="!warp-content">
    <div class="container ">
        <div class="row text-center">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 data-sr="enter top over 1s, wait 0.3s, move 24px, reset">Corrigez vos informations</h1>
                <form method="POST" action="/changeRequest">
                    <div class="form-group form-group-sm">
                        <br>
                        <div class="form-group form-group-sm">
                            <label for="email"></label>
                            <b>Nouvel email</b>
                            <input class="form-control" type="text" name="email" id="email" placeholder="actuel : <?= $_SESSION['userEmailAddress'] ?>">
                            <small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre email restera privé.</small>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="phone"></label>
                            <b>Nouveau téléphone</b>
                            <input class="form-control" type="number" name="phone" id="phone" placeholder="actuel : <?= $_SESSION['phoneNumber'] ?>">
                            <small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Votre numéro restera privé.</small>
                        </div>
                        <div class="form-group form-group-sm">
                            <label for="password"></label>
                            <b>Mot de passe actuel</b>
                            <input class="form-control" type="password" name="password" id="password">
                            <small data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset">Vous devez entrer votre mot de passe pour confirmer les modifications.</small>
                        </div>
                        <p class="bold" style="float:left;background-color:white;margin-left:10px;margin-left:10px;">Facultatif</p>
                        <div style="border-style:solid ;border-radius: 30px; padding:10px;margin-top:24px; border-color:MediumSlateBlue;">
                            <div class="form-group form-group-sm">
                                <label for="newPassword"></label>
                                <b style="margin-right:55px;">Nouveau mot de passe</b>
                                <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm">
                            </div>
                            <div class="form-group form-group-sm">
                                <label for="passwordConfirm"></label>
                                <b>Confirmez le mot de passe</b>
                                <input class="form-control" type="password" name="passwordConfirm" id="passwordConfirm">
                            </div>
                        </div>
                        <br>
                        <input type="submit" value="Je valide mes informations!" class="button-leweb">
                        <br>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>