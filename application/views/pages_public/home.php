<div class="">
	<div id="slider" class="sl-slider-wrapper">

		<div class="sl-slider">

			<?php $c=1; foreach ($anuncio as $a) { ?>
				<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img-<?=$c?>"></div>
						<h2><a href="detalle-anuncio"><?= $a->TITULO_ANUNCIO ?></a></h2>
						<h2 style="font-size:20px; margin-top:0px; padding:0px;"><a href="#"><?= $a->NRO_HABITACIONES ?> Habitaciones, <?= $a->NRO_BAÑOS ?> Baños, <?= $a->METROS_CUADRADOS ?> Metros cuadrados</a></h2>
						<blockquote>
							<p class="location"><span class="glyphicon glyphicon-map-marker"></span> <?= $a->direccion_inmueble ?> <?= $a->NRO_DIRECCION ?> <?= strtolower($a->NOMB_DISTRITO) ?>
							</p>
							<p>Tu ubicación, nuestra obsesión.</p>
							<cite>S/. <?= $a->PRECIO_MES ?>.00</cite>
						</blockquote>
					</div>
				</div>
			<?php if($c==5){break;} $c++; } ?>
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


<!-- banner -->
<div class="container">

	<div class="properties-listing spacer"> <a href="listado-anuncios" class="pull-right viewall">Ver todos los
			anuncios</a>
		<h2>Departamentos Destacados</h2>
		<form action="detalle-anuncio" method="POST">
			<div id="owl-example" class="owl-carousel">

				<?php foreach ($anuncio as $a) { 

					$resultado_valoracion_dividendo = ($a->VALOR_UNO)*1 + ($a->VALOR_DOS)*2 + ($a->VALOR_TRES)*3 + ($a->VALOR_CUATRO)*4 + ($a->VALOR_CINCO)*5;
					$resultado_valoracion_divisor = $a->VALOR_UNO + $a->VALOR_DOS + $a->VALOR_TRES + $a->VALOR_CUATRO + $a->VALOR_CINCO;
					if($resultado_valoracion_divisor == 0){
						$resultado_valoracion = 0;
					}else{
						$resultado_valoracion = $resultado_valoracion_dividendo/$resultado_valoracion_divisor;
					}
					$resultado_valoracion = (int)$resultado_valoracion;					
				?>
					<div class="properties">
						<input type="hidden" name="id_anuncio" value="1">
						<div class="image-holder"><img class="cover-img" src="<?php echo base_url('uploads/files/' . $a->NOMB_FOTO) ?>" class="img-responsive img-anuncios" alt="properties" />
						</div>
						<h4>							
							<a><?= $a->TITULO_ANUNCIO ?></a>
						</h4>
						<p class="price">Price: S/. <?= $a->PRECIO_MES ?></p>
						<div class="listing-detail">
							<span class="valoracion <?php if($resultado_valoracion == 5){ ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Bueno">5</span> 
							<span class="valoracion <?php if($resultado_valoracion == 4){ ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Bueno">4</span> 
							<span class="valoracion <?php if($resultado_valoracion == 3){ ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Normal">3</span> 
							<span class="valoracion <?php if($resultado_valoracion == 2){ ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Malo">2</span> 
							<span class="valoracion <?php if($resultado_valoracion == 1){ ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Malo">1</span> 
						</div>
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