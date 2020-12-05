<!DOCTYPE html>
<html lang="en">

<head>
	<title>VirtualRoom</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>assets/images/favicon.ico">

	<link rel="stylesheet" href="<?php base_url() ?>assets/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="<?php base_url() ?>assets/css/style.css" />
	<link rel="stylesheet" href="<?php base_url() ?>assets/libs/sweetalert2/dist/sweetalert2.min.css" />
	
	<!-- Owl stylesheet -->
	<link rel="stylesheet" href="<?php base_url() ?>assets/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?php base_url() ?>assets/owl-carousel/owl.theme.css">
	<!-- Owl stylesheet -->

	<!-- slitslider -->
	<link rel="stylesheet" type="text/css" href="<?php base_url() ?>assets/slitslider/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?php base_url() ?>assets/slitslider/css/custom.css" />
	<!-- slitslider -->
</head>

<body>

	<!-- Header Starts -->
	<div class="navbar-wrapper">
		<div class="navbar-inverse" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Nav Starts -->
				<div class="navbar-collapse  collapse">
					<ul class="nav navbar-nav navbar-right">
						<li <?php if ($this->uri->segment(1)=='inicio' || $this->uri->segment(1)=='' || $this->uri->segment(1)=='Inicio'){ ?>class="active" <?php }?>><a href="inicio">Inicio</a></li>
						<li <?php if ($this->uri->segment(1)=='nosotros'){ ?>class="active" <?php }?>><a href="nosotros">Acerca de nosotros</a></li>
						<li <?php if ($this->uri->segment(1)=='ayuda'){ ?>class="active" <?php }?>><a href="ayuda">Ayuda</a></li>
						<li <?php if ($this->uri->segment(1)=='contactenos'){ ?>class="active" <?php }?>><a href="contactenos">Contáctenos</a></li>
					</ul>
				</div>
				<!-- #Nav Ends -->
			</div>
		</div>

	</div>
	<!-- #Header Starts -->

	<?php
    $usuario='prueba';
  ?>

	<div class="container titulo">
		<!-- Header Starts -->
		<div class="header">
			<a class="" href="inicio"><img src="<?php base_url() ?>assets/images/virtualroom.png" alt="Realestate" style="width:160px;"></a>
			<h3 style="color:#7FCC26;">A un click de distancia, haz realidad tus sueños.</h3>
			<ul class="pull-right">			
        		<li><button class="btn-login" data-toggle="modal" data-target="#loginpop">Login</button></li>
			</ul>
		</div>		
	</div>
