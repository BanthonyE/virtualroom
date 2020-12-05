<!DOCTYPE html>
<html>
<head>
	<title>VirtualRoom</title>
	<link rel="stylesheet" type="text/css" href="<?php base_url() ?>assets/css/login.css">
	<link rel="shortcut icon" type="image/x-icon" href="<?php base_url() ?>assets/images/favicon.ico">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="<?php base_url() ?>assets/images/wave.png">
	<div class="container">
		<div class="img">
			<img src="<?php base_url() ?>assets/images/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST" action="login">
				<input type="hidden" name="tipo_usuario" value="admin">
				<img src="<?php base_url() ?>assets/images/avatar.svg">
				<h2 class="title">VirtualRoom</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Usuario</h5>
           		   		<input type="text" name="usuario" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Contraseña</h5>
           		    	<input type="password" name="password" class="input">
            	   </div>
            	</div>
            	<input type="submit" class="btn" value="Entrar">
				<button class="btn" onclick="window.location.href='Inicio'">Continue</button>
            </form>
        </div>

    </div>
    <script type="text/javascript" src="<?php base_url() ?>assets/js/login.js"></script>
</body>
</html>
