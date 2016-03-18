<!DOCTYPE html>
	<?php require_once 'ti.php' ?>
	<?php session_start(); ?>

	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">

	<html>
			<div class = "container">

				<head>

					<style>
						body {
						    background-color: lightblue;
						}

					</style>


						<link href="{% static 'css/style.css' %}" rel="stylesheet">

						<!-- Bootstrap core CSS -->
						<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

						<link href="css/signin.css'" type="text/css" rel="stylesheet">
						<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
						<!-- Custom styles for this template -->
						<!-- <link href="navbar-static-top.css" rel="stylesheet"> -->
						<link href="css/navbar-static-top.css" type="text/css" rel="stylesheet">
						<link href="css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">

						<link href="css/justified-nav.css" type="text/css" rel="stylesheet">

						<link href="css/offcanvas.css" type="text/css" rel="stylesheet">


				</head>	
			<body>

					
					
					<div class"navbar na vbar-default navbar-fixed-top">
						<div class="container">
							
						<ul class="nav nav-justified">

							<li {% if "active" == 'home' %}class="active"{% endif %}>
								<a href="home.php">Home</a>
							</li>
							<li {% if "nbar" == 'about' %}class="active"{% endif %}>
								<a href="aboutus.php">About Us</a>
							</li>
							<li {% if "nbar" == 'contact' %}class="active"{% endif %}>
								<a href="contactus.php">Contact Us</a>
							</li>
						
							<?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) : ?> 
							
									
									    <li {% if "nbar" == 'logout' %}class="active"{% endif %}>
											<a href="logout.php">Logout</a>
										</li>
									

							<?php else : ?>
							
									
								    <li {% if "nbar" == 'login' %}class="active"{% endif %}>
										<a href="login.php">Login</a>
									</li>
									
							<?php  endif ?>
						</ul>

						<div class="container">

							

								<?php startblock('header') ?>
								

								<h2>
									<div class="w3-container w3-leftbar w3-grey">
										<div class="row">
											<div class="col-sm-6">
												<p class="w3-xxlarge w3-serif"><i>
													<?php startblock('title') ?>
													<?php endblock() ?>
												</p>
											</div>

											<div class="col-sm-6">
												<?php
								
													if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
												    echo "Welcome to the plumber website, " . $_SESSION['username'] . "!";
														}
													
												?>
											</div>

										</div>
									
								</h2>



								<?php endblock() ?>

								

						</div>
						
					</div>

			</body>
		</div>
	</html>