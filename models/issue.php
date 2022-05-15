<?php
	session_start();
	require_once('../config/database.php');


	if (!isset($_SESSION['user_id'])) 
	{
		
		header("Location: ../index.php");
		exit();

	}
	$statut = (int) $_SESSION['statut'];


	if( $statut == 3 ) :

		header("Location: ../index.php");
		exit();

	endif;


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

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="../assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="../assets/css/main.css">


</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="../index.php">AnimalDom</a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="tickets.php">Buy tickets</a></li>
					<li><a href="shop.php">Shop</a></li>
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

								print('<li class="active"><a href="../models/issue.php">Issues</a></li>');
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
			<li class="active">Issues</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Signal an issue</h1>
				</header>
				
				<br>
					<form method="POST" action="issue.php">
						<div class="row">
							<div class="col-sm-4">
								<?php
									if (isset($_SESSION['user_id'])) 
									{
									
										print('<input class="form-control"  placeholder="firstname" disabled="disabled"  value="'.$_SESSION['firstname'].'">');
									} else {
										print('<input class="form-control" type="text" disabled="disabled"  placeholder="firstname">');

									}
								?>
							</div>
							<div class="col-sm-4">
								<?php
									if (isset($_SESSION['user_id'])) 
									{
									
										print('<input class="form-control" type="text" disabled="disabled"  placeholder="Lastname" value="'.$_SESSION['lastname'].'">');
									} else {
										print('<input class="form-control" type="text" disabled="disabled"  placeholder="lastname">');

									}
								?>							
							</div>
							<div class="col-sm-4">
								
								<?php
									if (isset($_SESSION['user_id'])) 
									{
									
										print('<input class="form-control" type="text" disabled="disabled"  placeholder="email" value="'.$_SESSION['email'].'">');
									} else {
										print('<input class="form-control" type="text" disabled="disabled"  placeholder="email">');

									}
								?>							
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea placeholder="Type your message here..." name="description" class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								<label class="checkbox"><input type="checkbox"> Sign up for newsletter</label>
							</div>
							<div class="col-sm-6 text-right">
								<button class="btn btn-action" name="submitIssue" type="submit"> Send message </button>
							</div>
						</div>
					</form>

					<?php

						if(isset($_POST['submitIssue'])){
							$description = $_POST['description'];
						

							$sql = "INSERT INTO issue (description, author) VALUES (? , ?)";
							$stmt= $conn->prepare($sql);

							$stmt->execute([$description,  $_SESSION['user_id']]);


						}

					?>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

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

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->
	
	<section class="container-full top-space">
		<div id="map"></div>
	</section>

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