<?php
ob_start();
$title = "event";
$currentPage = "#event";
?>
<!-- HEADER -->
<div  id="!content-wrap">
	<section id="header">
		<div class="container">
			<div class="row text-center ">
				<div class="col-md-8 col-sm-6 ">
					<h2 class="white-text bold">Polymanga 2021</h2>
					<h3 class="white-text">16ème édition 2021 au 2M2C de Montreux</h3>
					<br><br><br>
					<h1 class="white-text" id="headline">Pop culture is good</h1>
					<div class="countdown-1" data-countdown>
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
			<a class="arrow-down-animation" data-scroll href="#home"><i class="fa fa-angle-down"></i></a>
		</div>
	</section>
<!-- HEADER ENDS -->

<section id="eventDesc">
    <div class="text-center">
        <div>
            <h2>Description</h2>
        </div>
        <br>
        <div>
            <p>Créée en 2005 sur le campus de l’École polytechnique fédérale de Lausanne par la commission de l'AGEPoly PolyJapan (d’où son nom), la convention a accueilli à cette époque plus de 6 000 visiteurs. La convention quitte l'EPFL et déménage ensuite à Palexpo à Genève où elle a accueilli 8 000 visiteurs et à partir de 2007, elle emménage dans le Palais de Beaulieu à Lausanne, David Heim, le fondateur de Polymanga refusant d'intégrer le Salon du livre. Pour l'édition 2013, la convention quitte Lausanne et déménage à Montreux au 2m2c où elle atteindra les 35 000 visiteurs. En 2018, pour sa quatorzième édition, la convention a accueilli 41 000 personnes. </p>
        </div>
        <div>
            <h2>Date de début-Date de fin</h2>
        </div>
        <div>
            <p>10.06.2021 - 13.06.2021</p>
        </div>
        <div>
            <h2>Location</h2>
        </div>
        <div>
            <p>Montreux</p>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "view/gabarit.php";
?>