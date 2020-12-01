<div class="">
	<div id="slider" class="sl-slider-wrapper">

		<div class="sl-slider">

			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-1"></div>
					<h2><a href="#">2 Dormitorios, 1 sala y 1 comedor, Apartamento en Alquiler</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> Av. Delta, Los Olivos
						</p>
						<p>Tu ubicación, nuestra obsesión.</p>
						<cite>S/. 20,000,000</cite>
					</blockquote>
				</div>
			</div>

			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="10" data-slice2-rotation="-15" data-slice1-scale="1.5" data-slice2-scale="1.5">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-2"></div>
					<h2><a href="#">4 Dormitorios, 2 sala y 1 comedor, Apartamento en Alquiler</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> Av. Quekchup, Hamburg
						</p>
						<p>No busques más, has llegado al final del camino</p>
						<cite>$ 45,000,000</cite>
					</blockquote>
				</div>
			</div>

			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="3" data-slice2-rotation="3" data-slice1-scale="2" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-3"></div>
					<h2><a href="#">1 Dormitorios, 1 sala y 1 comedor, Apartamento en Alquiler</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> Av. Salazar, Puente
							Piedra</p>
						<p>Donde los sueños se hacen realidad.</p>
						<cite>$ 25,000,000</cite>
					</blockquote>
				</div>
			</div>

			<div class="sl-slide" data-orientation="vertical" data-slice1-rotation="-5" data-slice2-rotation="25" data-slice1-scale="2" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-4"></div>
					<h2><a href="#">3 Dormitorios, 2 sala y 2 comedor, Apartamento en Alquiler</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span> Av. Checa, Check check
							checa checa</p>
						<p>Líder mundial en negocios inmobiliarios.</p>
						<cite>$ 29,000,000</cite>
					</blockquote>
				</div>
			</div>

			<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1">
				<div class="sl-slide-inner">
					<div class="bg-img bg-img-5"></div>
					<h2><a href="#">2 Dormitorios, 1 sala y 1 comedor, Apartamento en Alquiler</a></h2>
					<blockquote>
						<p class="location"><span class="glyphicon glyphicon-map-marker"></span>Av. La Hacienda,
							Carabayllo</p>
						<p>Juntos encontraremos el hogar de tus sueños.</p>
						<cite>$ 15,000,000</cite>
					</blockquote>
				</div>
			</div>
		</div><!-- /sl-slider -->



		<nav id="nav-dots" class="nav-dots">
			<span class="nav-dot-current"></span>
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</nav>

	</div><!-- /slider-wrapper -->
</div>



<div class="banner-search">
	<div class="container">
		<!-- banner -->
		<!-- 		<h3>Buscar Departamento</h3>
		<div class="searchbar">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<input type="text" class="form-control" placeholder="Ingrese nombre	">
					<div class="row">
						<div class="col-lg-3 col-sm-4">
							<select class="form-control">
								<option>Precio</option>
								<option>$150,000 - $200,000</option>
								<option>$200,000 - $250,000</option>
								<option>$250,000 - $300,000</option>
								<option>$300,000 - above</option>
							</select>
						</div>
						<div class="col-lg-3 col-sm-4">
							<select class="form-control">
								<option>Ubicacion</option>
								<option>Puente Piedra</option>
								<option>Los Olivos</option>
								<option>Carabayllo</option>
							</select>
						</div>
						<div class="col-lg-3 col-sm-4">
							<button class="btn btn-success"
								onclick="window.location.href='buysalerent.php'">Buscar</button>
						</div>
					</div>


				</div>
				<?php if (!isset($nombre_usuario)) { ?>
				<div class="col-lg-5 col-lg-offset-1 col-sm-6 ">
					<p>Únnete ahora y mantente actualizado con todas las ofertas de propiedades.</p>
					<button class="btn btn-info" data-toggle="modal" data-target="#loginpop">Login</button>
				</div>
				<?php } ?>

			</div>
		</div> -->
	</div>
</div>
<!-- banner -->
<div class="container">

	<div class="properties-listing spacer"> <a href="listado-anuncios" class="pull-right viewall">Ver todos los
			anuncios</a>
		<h2>Departamentos Destacados</h2>
		<form action="detalle-anuncio" method="POST">
			<div id="owl-example" class="owl-carousel">

				<?php foreach ($anuncio as $a) { ?>
					<div class="properties">
						<input type="hidden" name="id_anuncio" value="1">
						<div class="image-holder"><img class="cover-img" src="<?php echo base_url('uploads/files/' . $a->NOMB_FOTO) ?>" class="img-responsive img-anuncios" alt="properties" />
						</div>
						<h4>
							<a href="detalle-anuncio"><?= $a->TITULO_ANUNCIO ?></a>
						</h4>
						<p class="price">Price: S/. <?= $a->PRECIO_MES ?></p>
						<div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Bueno">5</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Bueno">4</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Normal">3</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Malo">2</span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Malo">1</span> </div>
						<button class="btn btn-primary" id="btnDetalle" name="btnDetalle" type="submit" value="<?= $a->ID_ANUNCIO ?>">Ver Detalles</button>
					</div>
				<?php } ?>
			</div>
		</form>
	</div>
	<div class="spacer">
		<div class="row">
			<div class="col-lg-6 col-sm-9 recent-view">
				<h3>Acerca de nosotros..</h3>
				<p>Casa y Gestión es una agencia
					inmobiliaria, de origen español, pero
					100% peruana. Inició sus actividades
					en Lima-Perú el 17 de abril del año
					2013.
					Encargada de captar, gestionar,
					promover y comercializar proyectos
					inmobiliarios en todos los distritos de
					Lima.<br><a href="about.php">Leer más</a></p>

			</div>
			<div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
				<h3>Departamentos recomendados..</h3>
				<div id="myCarousel" class="carousel slide">
					<ol class="carousel-indicators">
						<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
						<li data-target="#myCarousel" data-slide-to="1" class=""></li>
						<li data-target="#myCarousel" data-slide-to="2" class=""></li>
						<li data-target="#myCarousel" data-slide-to="3" class=""></li>
					</ol>
					<!-- Carousel items -->
					<form action="detalle-anuncio" method="POST">
						<div class="carousel-inner">
							<?php $cont = 0;
							foreach ($anuncio as $a) { ?>
								<div class="item <?php if ($cont == 0) {
														echo "active";
													} ?>">
									<div class="row">
										<div class="col-lg-4"><img src="<?php echo base_url('uploads/files/' . $a->NOMB_FOTO) ?>" class="img-responsive" alt="properties" />
										</div>
										<div class="col-lg-8">
											<p class="price"> Ubicacion : <?= $a->DIRECCION ?>, <?php echo strtolower("" . $a->NOMB_DISTRITO) ?> </p>
											<p class="price"> Precio : s/. <?= $a->PRECIO_MES ?></p>
											<h5>
												<button class="btn btn-primary" id="btnDetalle" name="btnDetalle" type="submit" value="<?= $a->ID_ANUNCIO ?>">Ver Detalle</button>
											</h5>
										</div>
									</div>
								</div>
							<?php $cont++;
							} ?>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>