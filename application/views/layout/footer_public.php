<div class="footer">

	<div class="container">

		<div class="row">
			<div class="col-lg-4 col-sm-4">
				<h4>Información</h4>
				<ul class="row">
					<li class="col-lg-12 col-sm-12 col-xs-3"><a href="inicio">Inicio</a></li>
					<li class="col-lg-12 col-sm-12 col-xs-3"><a href="nosotros">Acerca de Nosotros</a></li>
					<li class="col-lg-12 col-sm-12 col-xs-3"><a href="ayuda">Ayuda</a></li>
					<li class="col-lg-12 col-sm-12 col-xs-3"><a href="contactenos">Contactanos</a></li>
				</ul>
			</div>
			<div class="col-lg-4 col-sm-4">
				<h4>Síguenos en</h4>
				<a href="#"><img src="<?php base_url() ?>assets/images/facebook.png" alt="facebook"></a>
				<a href="#"><img src="<?php base_url() ?>assets/images/twiter.png" alt="twitter"></a>
				<a href="https://youtu.be/bCR1ZAT5oGw"><img src="<?php base_url() ?>assets/images/youtube.png" alt="youtube"></a>
				<a href="#"><img src="<?php base_url() ?>assets/images/instagram.png" alt="instagram"></a>
			</div>

			<div class="col-lg-4 col-sm-4">
				<h4>Contáctanos</h4>
				<p><b>"Virtual Room".</b><br>
					<span class="glyphicon glyphicon-map-marker"></span> 15009 15009, Av. Los Chancas 317, Santa Anita 15009 <br>
					<span class="glyphicon glyphicon-envelope"></span> virtual.room10@gmail.com<br>
					<span class="glyphicon glyphicon-earphone"></span> 5388820</p>
			</div>
		</div>
		<p class="copyright" align="center">Copyright &copy "año 2020" "VIRTUAL ROOM". Todos los derechos reservados.</p>
	</div>
</div>



<!-- Modal -->
<div id="loginpop" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="row">
				<div class="col-sm-12 login">
					<h4 class="text-center">Login</h4>
					<form class="" role="form" method="POST" action="login">
						<input type="hidden" name="tipo_usuario" value="publico">
						<div class="form-group">
							<label class="sr-only" for="usuario">Usuario</label>
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingresar Usuario">
						</div>
						<div class="form-group">
							<label class="sr-only" for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password" placeholder="Ingresar contraseña">
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox"> Remember me
							</label>
						</div>
						<button type="submit" class="btn btn-success">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php if (isset($mensaje)) { ?>
		<input type="hidden" value="<?= $mensaje ?>" id="mensaje" name="mensaje">
	<?php } ?>
</div>
<!-- /.modal -->
<script src="<?php base_url() ?>assets/js/jquery-3.4.1.min.js"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmjQezy3AlQ9MKZLBHy-6mCqpF5d78q7w&callback=initMap&libraries=&v=weekly" defer></script>

<script src="<?php base_url() ?>assets/bootstrap/js/bootstrap.js"></script>
<script src="<?php base_url() ?>assets/js/script.js"></script>
<!-- Owl stylesheet -->
<script src="<?php base_url() ?>assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->

<!-- slitslider -->
<script type="text/javascript" src="<?php base_url() ?>assets/slitslider/js/modernizr.custom.79639.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/slitslider/js/jquery.ba-cond.min.js"></script>
<script type="text/javascript" src="<?php base_url() ?>assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->
<script src="<?php base_url() ?>assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php base_url() ?>assets/js/validacion.js"></script>

<?php if ($this->uri->segment(1) == 'detalle-anuncio') { ?>
	<script src="<?php base_url() ?>assets/js/personas-interesadas.js"></script>
<?php } ?>

<?php if ($this->uri->segment(1) == 'registrar_usuario') { ?>
	<script src="<?php base_url() ?>assets/js/dni-api.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'contactenos' || $this->uri->segment(1) == 'enviar_email') { ?>
	<script src="<?php base_url() ?>assets/js/contact.js"></script>
<?php } ?>

<?php if (isset($mensaje)) { ?>
	<script src="<?php base_url() ?>assets/js/alerta-mensaje.js"></script>
<?php } ?>
<?php if ($this->uri->segment(1) == 'detalle-anuncio') { ?>
	<script>
		function visualizar_recorrido($var) {

			var url = $var;

			var iframe = '<iframe src="' + url + '" width="600" height="600" frameborder="0"></iframe>';

			Swal.fire({
				title: 'Recorrido virtual ',
				html: iframe,
				width: 650,
				height: 700
			})
		}

		var coord2 = [];
		let map;

		function initMap() {
			var distrito = $('#distrito').val();
			var direccion = $('#direccion').val();
			var numdireccion = $('#numdireccion').val();
			let url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + direccion + '+' + numdireccion + '+' + distrito + '&key=AIzaSyDmjQezy3AlQ9MKZLBHy-6mCqpF5d78q7w&callback=initMap';

			const api = new XMLHttpRequest();
			api.open('GET', url, true);
			api.send();

			api.onreadystatechange = function() {
				if (this.status == 200 && this.readyState == 4) {

					let datos = JSON.parse(this.responseText);
					var coord = datos.results[0].geometry.location;
					map = new google.maps.Map(document.getElementById("map"), {
						center: coord,
						zoom: 15,

					});
					var marker = new google.maps.Marker({
						position: coord,
						map: map
					});

				}
			}
		}

		function valoracion($var1, $var2) {
			let puntuacion = $var1;
			let id_anuncio = $var2;
			$.ajax({
				type: 'POST',
				url: "valorarAnuncio",
				data: {
					puntuacion: puntuacion,
					id_anuncio: id_anuncio
				},
				success: function(data) {

					Swal.fire({
						title: 'Gracias por valorar el anuncio',
						icon: 'success',
						confirmButtonColor: '#3085d6',
					});

				}
			});
		}
	</script>
<?php } ?>
</body>

</html>