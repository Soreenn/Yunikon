<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
?>
<!--
	Shine by TEMPLATE STOCK
	templatestock.co @templatestock
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->

<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>


	<!-- WEB FONTS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>

	<!-- BOOTSTRAP -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<!-- FONT AWESOME -->
	<link rel="stylesheet" href="/view/content/css/font-awesome.min.css">
	<!-- CUSTOM STYLING -->
	<link href="/view/content/css/styles.css" rel="stylesheet">


</head>

<body>
	<!-- PRELOADER -->
	<div id="loader-wrapper">
		<div id="loader">
			<div class="sk-spinner sk-spinner-cube-grid">
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
				<div class="sk-cube"></div>
			</div>
		</div>
	</div>

	<header class="sticky-top" data-spy="affix" data-offset-top="0">
		<nav class="navbar navbar-inverse">

			<div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			
						<ul class="nav navbar-nav navbar-right">
							<li ><a href="/home">Home</a></li>
							</li>
							<?php if ($_SERVER["REQUEST_URI"] == "/" || $_SERVER["REQUEST_URI"] == "/home/") : ?>
								<li><a data-scroll href="#subscribe">Newsletter</a></li>
							<?php endif; ?>
							</li>
							<li >
								<a href="/eventList">Event list</a>
							</li>
							<?php if (!isset($_SESSION['userEmailAddress'])) : ?>
								<//?php if (exhibitor() == 1) : ?>
									<li >
										<a href="/add-event"> +</a>
									</li>
								<?php endif; ?>

								<li>
									<a href="/register">Register</a>
								</li>
							<//?php else : ?>
								<li>
									<a href="/logout">Logout</a>
								</li>
							<//?php endif; ?>
							<?php if (!isset($_SESSION['userEmailAddress'])) : ?>
								<li>
									<a href="/login">Login</a>
								</li>
							<?php else : ?>

								<li">
									<a>Bienvenue <?= $_SESSION['firstname'] ?></a>
								</li>
							<?php endif; ?>
							<li>
								<a href="/contact">Contact</a>
							</li>
						</ul>
				
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</header>


	<?= $content; ?>

	<!-- FOOTER -->
	<footer id="footer">
		<div class="container">
			<div class="row text-center">
				<div>
					<p>
						Template designed by <a href="http://templatestock.co">Template Stock</a>
					</p>
				</div>
				<div>
					<p>
						Website made by Yunikon team <a href="https://github.com/Soreenn/Yunikon"><img src="view\content\images\GitHub.png" height="28"></a>
					</p>
				</div>
			</div>
		</div>
	</footer>
	<!-- FOOTER ENDS -->


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/view/content/js/bootstrap.min.js"></script>
	<!-- Countdown -->
	<script src="/view/content/js/countdown.js"></script>
	<!-- SMOOTH SCROLL -->
	<script src="/view/content/js/smooth-scroll.min.js"></script>
	<!-- PARALLAX IMG -->
	<script src="/view/content/js/jquery.parallax-1.1.3.js"></script>
	<!-- SCROLL REVEAL -->
	<script src="/view/content/js/scrollReveal.min.js"></script>
	<!-- FUNCTIONS -->
	<script src="/view/content/js/functions.js"></script>

</body>

</html>