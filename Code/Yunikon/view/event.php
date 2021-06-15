<?php
ob_start();
$title = "event";
$currentPage = "#event";
?>
<!-- HEADER -->
<div id="!content-wrap">
	<?php if ($eventData[0]['image'] != "") : ?>
		<section id="header" style="background: url(<?= $eventData[0]['image'] ?>) no-repeat center center;">
		<?php else : ?>
			<section id="header" style="background: url(view/content/images/envent_base.jpg) no-repeat center center;">
			<?php endif ?>
			<div class="container">
				<div class="row text-center ">
					<div class="col-md-8 col-sm-6 ">
						<h2 class="white-text bold"><?= $eventData[0]['name'] ?></h2>
						<h3 class="white-text"></h3>
						<br><br><br>
						<?php $date = date("Y,m,d");
						if ($eventData[0]['startingDate'] < $date) : ?>
							<?php if ($eventData[0]['endingDate'] < $date) : ?>
								<h2 class="white-text" id="headline">L'evenement s'est terminé le <?= $eventData[0]['endingDate'];?></h2>
								<?php else : ?>
								<h2 class="white-text" id="headline">L'evenement est en cours et se terminera le <?= $eventData[0]['endingDate'];?></h2>
								<div id="countdown" class="countdown-1" data-countdown data-target=<?=$eventData[0]['endingDate']?>>
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
							<?php endif ; ?>
						<?php else : ?>
							<h2 class="white-text" id="headline">L'evenement commencera le <?= $eventData[0]['startingDate'];?></h2>
							<div id="countdown" class="countdown-1" data-countdown data-target=<?=$eventData[0]['startingDate']?>>
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
						<?php endif; ?>
					</div>
				</div>
			</div>
			<div class="animation">
				<a class="arrow-down-animation" data-scroll href="#eventDesc"><i class="fa fa-angle-down"></i></a>
			</div>
			</section>
			<!-- HEADER ENDS -->

			<section id="eventDesc">
				<div class="text-center">
					<?php if ($eventData[0]['description'] != "") : ?>
						<div>
							<h2>Description</h2>
						</div>
						<br>
						<div class="description">
							<div>
								<p><?= $eventData[0]['description'] ?> </p>
							</div>
						</div>
					<?php endif ?>
					<div>
						<h2>Date de début-Date de fin</h2>
					</div>
					<div>
						<p><?= $eventData[0]['startingDate'] ?> - <?= $eventData[0]['endingDate'] ?></p>
					</div>
					<div>
						<h2>Lieu</h2>
					</div>
					<div>
						<p><?= $eventData[0]['location'] ?></p>
						<br>
					</div>
				</div>
			</section>
			<?php
			$content = ob_get_clean();
			require "view/gabarit.php";
			?>