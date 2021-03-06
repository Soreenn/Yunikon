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
                    <h2 class="white-text"><b>Bonjour</b> <?=htmlspecialchars($_SESSION['firstname'])?></h2>
                    <br><br><br>
                    <div style="width:50%;float:left;text-align:right;padding-right:10px;;">
                        <h3 class="white-text"><b>Mail : </b></h3>
                        <h3 class="white-text"><b>Annonceur : </b></h3>
                    </div>
                    <div style="width:50%;float:right;text-align:left;">
                        <h3 class="white-text"><?=htmlspecialchars($_SESSION['userEmailAddress'])?></h3>
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
    <div id="content-wrap">
        <section id="homeEvent">
            <div>
                <?php if ($_SESSION['exhibitor'] == 1) : ?>
                <h2>Vos evenements</h2>
                <?php endif ;?>
                <div class="container">
                    <div class="row text-center">
                        <?php foreach ($items as $row) : ?>
                            <div class="col-md-4">
                                <a href="/event?id=<?=$row['id']?>">
                                    <?php if ($row['image']) : ?>
                                        <img class="banner" style="object-fit:contain; width: 100%" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="<?=$row['image']?>">
                                    <?php else : ?>
                                        <img class="banner" style="object-fit:contain; width: 100%" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/noPhoto.png">
                                    <?php endif; ?>
                                    <b>
                                    <a  href="/delEvent?id=<?=$row['id']?>" style="float:left;"> <img src="/view/content/images/Trash.png" height="27"></a>
                                        <figcaption><?=htmlspecialchars($row['name'])?></figcaption>
                                        
                                    </b>
                                </a>
                            </div>
                        <?php endforeach; ?>

                        <?php if (!empty($tickets)) : ?>
                <h2>Vos Tickets</h2>
                <?php endif ;?>
                <div class="container">
                    <div class="row text-center">
                        <?php foreach ($tickets as $row) :$event = getEventById($tickets[0]['Event_id']) ;?>
                            <div class="col-md-4">
                                <a href="/event?id=<?=$event[0]['id']?>">
                                    <?php if ($event[0]['image']) : ?>
                                        <img class="banner" style="object-fit:contain; width: 100%" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="<?=$event[0]['image']?>">
                                    <?php else : ?>
                                        <img class="banner" style="object-fit:contain; width: 100%" data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" src="/view/content/images/noPhoto.png">
                                    <?php endif; ?>
                                    <b>
                                        <figcaption>Ticket : <?=htmlspecialchars($row['u_number'])?></figcaption>
                                    </b>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
    <?php
    $content = ob_get_clean();
    require "view/gabarit.php";
    ?>