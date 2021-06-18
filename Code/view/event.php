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
				<h2 class="white-text bold"><?=htmlspecialchars($eventData[0]['name'])?></h2>
				<h3 class="white-text"></h3>
				<br><br><br>
				<?php if ($eventData[0]['startingDate'] < $date) : ?>
					<?php if ($eventData[0]['endingDate'] < $date) : ?>
						<h2 class="white-text" id="headline">L'evenement s'est terminé le <?= $eventData[0]['endingDate']; ?></h2>
					<?php else : ?>
						<h2 class="white-text" id="headline">L'evenement est en cours et se terminera le <?= $eventData[0]['endingDate']; ?></h2>
						<div id="countdown" class="countdown-1" data-countdown data-target=<?= $eventData[0]['endingDate'] ?>>
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
				<?php else : ?>
					<h2 class="white-text" id="headline">L'evenement commencera le <?= $eventData[0]['startingDate']; ?></h2>
					<div id="countdown" class="countdown-1" data-countdown data-target=<?= $eventData[0]['startingDate'] ?>>
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
						<p><?=htmlspecialchars($eventData[0]['description'])?> </p>
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
				<p><?=htmlspecialchars($eventData[0]['location'])?></p>
				<br>
			</div>
			<div>
				<?php if ($eventData[0]['endingDate'] < $date) : ?>
					<h2 id="headline">Les tickets ne sont plus en vente</h2>
				<?php else : ?>

					<p class="bold">Il reste <?= $remaining ?> tickets </p>
					<?php if ($remaining > 0) : ?>
						<!-- <button class="button-leweb"> Acheter mon ticket </button> -->
						<form action=" https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_xclick">
							<input type="hidden" name="business" value="Cyprien04@hotmail.com">
							<input type="hidden" name="lc" value="CH">
							<input type="hidden" name="item_name" value="Ticket">
							<input type="hidden" name="amount" value=<?= $price ?>>
							<input type="hidden" name="currency_code" value="CHF">
							<input type="hidden" name="button_subtype" value="services">
							<input type="hidden" name="no_note" value="0">
							<input type="hidden" name="tax_rate" value="0.000">
							<input type="hidden" name="shipping" value="0.00">
							<input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_SM.gif:NonHostedGuest">
							<input type="image" src="https://www.paypalobjects.com/fr_FR/CH/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal, le réflexe sécurité pour payer en ligne">
							<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>

						<figcaption style="font-size:80%;">Acheter avec paypal</figcaption>

						<?php if(isset($_SESSION['userEmailAddress'])) : ?>
						<!--this button is for decrement the ticekts because i can't test it with the paypal button
						because of the tax in every payment	--> <a href="/decrementTickets?id=<?=$eventData[0]['id']?>">Decrement</a>  
                    	<?php endif;?>
					<?php endif; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>
	<?php
	$content = ob_get_clean();
	require "view/gabarit.php";
	?>