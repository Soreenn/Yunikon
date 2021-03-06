<?php
ob_start();
$title = "event-Liste";
$currentPage = "#eventList";

?>
<!-- HEADER -->
<div id="!content-wrap">
    <section id="header" style="background: url(view/content/images/List.jpg) no-repeat center center;">
        <div class="container">
            <div class="row text-center ">
                <div class="col-md-8 col-sm-6 ">
                    <img class="logo" src="/view/content/images/Logo/Small-logo.png">
                    <h2 class="white-text">L'univers Pop Culture</h2>
                    <br><br><br>
                    <div id ="countdown" class="countdown-1" data-countdown data-target=<?=$nextEvent[0]['next_event']?>>
                        <div class="days white-text">
                            <span class="amount"></span>
                            <span class="labelTime"></span>
                        </div>
                        <div class="hours white-text">
                            <span class="amount"></span>
                            <span class="labelTime"></span>
                        </div>
                        <div class="minutes white-text">
                            <span class="amount"></span>
                            <span class="labelTime"></span>
                        </div>
                        <div class="seconds white-text">
                            <span class="amount"></span>
                            <span class="labelTime"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="animation">
            <a class="arrow-down-animation" data-scroll href="#homeEvent"><i class="fa fa-angle-down"></i></a>
        </div>
    </section>
    <!-- HEADER ENDS -->

    <div id="content-wrap">
        <section id="homeEvent">
            <div>
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
                                        <figcaption><?=htmlspecialchars($row['name'])?></figcaption>
                                    </b>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php
    $content = ob_get_clean();
    require "view/gabarit.php";
    ?>