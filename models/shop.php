<?php
session_start();
require_once('../config/database.php');
require_once('../class/Shop.php');

$shop = new Shop($conn);

$records = $conn->query('SELECT * FROM shop');


if (isset($_POST['buy'])) {
	if (isset($_SESSION['user_id'])) 
	{
		$item_id = $_POST['itemId'];
		$addShop = $shop->buyShop($_SESSION['user_id'], $item_id);
		
		if ($addShop === true)
		{
			$message='Congratulation for your order!';
			echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
		} 
		else 
		{
			return $addshop;

		}
	} else {
		$message='To buy a goodie you have to be connected';
		echo '<script type="text/javascript">window.alert("'.$message.'");</script>';
	}
    
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Issues us - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous"> -->


	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="../assets/css/main.css">

	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="../">AnimalDom</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="tickets.php">Buy tickets</a></li>
					<li class="active"><a href="shop.php">Shop</a></li>
					<!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.php">Left Sidebar</a></li>
							<li><a href="sidebar-right.php">Right Sidebar</a></li>
						</ul>
					</li> -->
					<?php

						if(!isset($_SESSION['user_id'])):

							print '<li><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>';
						endif;

						if(isset($_SESSION['statut'])):
							$statut = (int) $_SESSION['statut'];

							if( $statut == 2 || $statut == 1 ) :

								print('<li><a href="../models/issue.php">Issues</a></li>');
							endif;

							if($statut == 1):
								print '<li><a href="index.php">Parameters</a></li>';
							endif;

							if(isset($_SESSION['user_id'])):
								print'<li><a class="btn" href="logout.php">LOGOUT</a></li>';

							endif;
						endif;
					?>	
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="../index.php">Home</a></li>
			<li class="active">Shop</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-15 maincontent">
				<header class="page-header">
					<h1 class="page-title">Buy your goodies here</h1>
				</header>
				
				<!-- <p>
					We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
				</p> -->

				<div class="row">
					<?php
						while($donnees = $records->fetch()){
								print('<div class="col-lg-2">');
									print('<div class="card" style="width: 18rem;">');
										print('<img src="https://img.ltwebstatic.com/images3_pi/2022/01/06/1641440438a8aec1335cd3686ff0e80260b25491d8_thumbnail_900x.webp" class="card-img-top" alt="...">');
										print('<form method="POST" action="shop.php">');
											print('<div class="card-body">');
												print('<input type="hidden" name="itemId" class="form-control" id="exampleInputEmail1" value="' . $donnees['id'] . '" >');
												print('<h5 class="card-title">'); print($donnees['name'] ."\n"); print('</h5>');
												print('<p class="card-text">'); print($donnees['description'] ."\n"); print('</p>');
												print('<p class="card-text">'); print($donnees['price'] . ' $'. "\n"); print('</p>');
												print('<button name="buy" class="btn btn-success" type="submit">Buy</button>');

											print('</div>');
										print('</form>');
									print('</div>');		
								print('</div>');

						}
						?>
			</div>
					
			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<!-- <aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Address</h4>
					<address>
						2002 Holcombe Boulevard, Houston, TX 77030, USA
					</address>
					<h4>Phone:</h4>
					<address>
						(713) 791-1414
					</address>
				</div>

			</aside> -->
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
	<!-- <section class="container-full top-space">
		<div id="map"></div>
	</section> -->

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Issues</h3>
						<div class="widget-body">
							<p>+234 23 9873237<br>
								<a href="mailto:#">some.email@somewhere.com</a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="../index.php">Home</a> | 
								<a href="../models/about.php">About</a> |
																<a href="../models/issue.php">Issues</a> |
								<b><a href="../models/signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2014, Your name. 
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>		
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="../assets/js/headroom.min.js"></script>
	<script src="../assets/js/jQuery.headroom.min.js"></script>
	<script src="../assets/js/template.js"></script>
	
	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="../assets/js/google-map.js"></script>
	

</body>
</html>