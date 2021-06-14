<?php
ob_start();
$title = "Account";
$currentPage = "#account";
?>
<!-- HEADER -->
<div id="!content-wrap">
    <section id="header" style="background: url(view/content/images/accountBG.jpg) no-repeat center center;">
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-8 col-sm-6 ">
                    <img class="logo" src="/view/content/images/Logo/Small-logo.png">
                    <h1 class="white-text"><b>Bonjour</b> <?= $_SESSION['firstname'] ?></h1>
                    <br><br><br>
                    <div style="width:50%;float:left;text-align:right;padding-right:10px;;">
                        <h3 class="white-text"><b>Mail : </b></h3>
                        <h3 class="white-text"><b>Annonceur : </b></h3>
                    </div>
                    <div style="width:50%;float:right;text-align:left;">
                        <h3 class="white-text"><?= $_SESSION['userEmailAddress'] ?></h3>
                        <?php if ($_SESSION['exhibitor'] == 1) : ?>
                            <h3 class="white-text">Oui</h3>
                        <?php else : ?>
                            <h3 class="white-text">Non</h3>
                        <?php endif; ?>
                        <div class="col-md-8 accBtn" style="text-align:center;">
                            <a href="/changeRegister"><button class="button-leweb">Mes informations sont éronnées</button></a>
                            <figcaption style="color:lightgray;font-size:smaller;">Utilisez ce bouton pour : Changer vos informations si elle ne sont pas/plus valide. Changer de mot de passe.</figcaption>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    $content = ob_get_clean();
    require "view/gabarit.php";
    ?>