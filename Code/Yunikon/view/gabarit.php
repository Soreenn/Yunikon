<!DOCTYPE html>
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
		<title><?=$title?></title>

		
		<!-- WEB FONTS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:100,300,100italic,400,300italic' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
		
		<!-- BOOTSTRAP -->
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<!-- FONT AWESOME -->
		<link rel="stylesheet" href="/view/content/css/font-awesome.min.css">
		<!-- CUSTOM STYLING -->
		<link href="/view/content/css/styles.css" rel="stylesheet">
		<!-- PRELOADER -->	
		<link href="/view/content/css/loader.css" rel="stylesheet">
			
	</head>
	
<body>
	<!-- PRELOADER -->
		<div id="loader-wrapper">
			<div id="loader"><div class="sk-spinner sk-spinner-cube-grid"><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div><div class="sk-cube"></div></div></div>
		</div>	

		<header class="sticky-top" data-spy="affix" data-offset-top="0">
		<nav class="navbar navbar-transparent">
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
	  <li><a data-scroll href="#home">Home</a></li>
        </li>
	  <li><a data-scroll href="#subscribe">Newsletter</a></li>
        </li>
        <li><a href="#">Login</a></li>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>

	<?= $content; ?>

	<!-- SUBSCRIBE -->
		<section id="subscribe">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-8 col-md-offset-2">
						<h2 data-sr="enter top over 1s, wait 0.3s, move 24px, reset" class="white-text">Inscription a la Newsletter</h2>
						<h5 data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" class="white-text">Restez informés des nouvelles !</h5>
						<!-- MAILCHIMP FORM -->
						<form id="mc_form" role="form">
							<input data-sr="enter top over 1s, wait 0.3s, move 24px, reset" type="email" class="form-control" id="mc-email" name="mc-email" placeholder="Your Email" />
							<button data-sr="enter bottom over 1s, wait 0.3s, move 24px, reset" type="submit" class="button-leweb">Submit</button>
							<label for="mc-email" class="mc-email"></label>
						</form>
						<!-- MAILCHIMP FORM ENDS -->
					</div>
				</div>
			</div>	
		</section>
	<!-- SUBSCRIBE ENDS -->
	
	<!-- FOOTER -->
		<footer id="footer">
			<div class="container">
				<div class="row text-center">	
					<p>
						&copy; 2016 Shine | DESIGN BY <a href="http://templatestock.co">Template Stock</a>
						<span class="social">
							<a href="#"><i class="fa fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-twitter-square"></i></a> 
							<a href="#"><i class="fa fa-google-plus-square"></i></a>
						</span>
					</p>
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