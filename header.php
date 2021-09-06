<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Orbitor,business,company,agency,modern,bootstrap4,tech,software">
  <meta name="author" content="themefisher.com">

  <title>Life + Care</title>

  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="novena/images/favicon.ico" />

  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="novena/plugins/bootstrap/css/bootstrap.min.css">
  <!-- Icon Font Css -->
  <link rel="stylesheet" href="novena/plugins/icofont/icofont.min.css">
  <!-- Slick Slider  CSS -->
  <link rel="stylesheet" href="novena/plugins/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="novena/plugins/slick-carousel/slick/slick-theme.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="novena/css/style.css">

</head>

<body id="top">

<header style="border-bottom-style: solid; border-color: #223a66;">
	<div class="header-top-bar">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<ul class="top-bar-info list-inline-item pl-0 mb-0">
						<li class="list-inline-item"><a href="mailto:support@gmail.com"><i class="icofont-support-faq mr-2"></i>lifecare@gmail.com</a></li>
						<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i>Address Thane, Maharashtra, India </li>
					</ul>
				</div>
				<div class="col-lg-6">
					<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
						<a href="tel:+23-345-67890" >
							<span>Call Now : </span>
							<span class="h4">123-456-7891</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-expand-lg navigation" id="navbar">
		<div class="container">
		 	 <a class="navbar-brand" href="index.html">
			  	<img src="novena/images/logo.png" alt="" class="img-fluid">
			  </a>

		  	<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
			<span class="icofont-navigation-menu"></span>
		  </button>
	  
		  <div class="collapse navbar-collapse" id="navbarmain">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item active">
				<a class="nav-link" href="novena/index.php">Home</a>
			  </li>
			   <li class="nav-item"><a class="nav-link" href="novena/about.php">About</a></li>
			    <li class="nav-item"><a class="nav-link" href="novena/service.php">Services</a></li>

			   

			    <li class="nav-item"><a class="nav-link" href="novena/blog-sidebar.php">Blogs</a></li>
			   <li class="nav-item"><a class="nav-link" href="novena/contact.php">Contact</a></li>
			   <?php
			   if (isset($_SESSION['patient_id'])) {?>
			   <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			   <?php 
			}else{
				?>
				<li class="nav-item"><a class="nav-link" href="login.php">Login/Register</a></li>
				<?php
					}
					?>
			   
			   
			</ul>
		  </div>
		</div>
	</nav>
</header>