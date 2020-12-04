<!-- banner -->
<div class="inside-banner">
	<div class="container">
		<span class="pull-right"><a href="#">Inicio</a> / Detalles</span>
		<h2>Detalles del Departamento</h2>
	</div>
</div>
<!-- banner -->


<div class="container">
	<div class="properties-listing spacer">

		<div class="row">
			<div class="col-lg-3 col-sm-4 hidden-xs">
				<form action="detalle-anuncio" method="POST">
					<div class="hot-properties hidden-xs">
						<h3>Departamentos Recomendados</h3>

						<?php $cont = 0;
						foreach ($lista_anuncios as $la) {
							$d = rand(1, 3);
							if ($d != 1) {
								$cont++;
								if ($cont <= 3) {
						?>
									<div class="row">
										<div class="col-lg-4 col-sm-5"><img src="<?php echo base_url('uploads/files/' . $la->NOMB_FOTO) ?>" class="img-responsive img-circle" alt="properties" /></div>
										<div class="col-lg-8 col-sm-7">
											<p class="price"> Ubicacion : <?= $la->DIRECCION ?>,
												<?php echo strtolower("" . $la->NOMB_DISTRITO) ?></p>
											<p class="price"> Precio : $<?= $la->PRECIO_MES ?></p>
											<button class="btn btn-primary" id="btnDetalle" name="btnDetalle" type="submit" value="<?= $la->ID_ANUNCIO ?>">Ver Detalle</button>
										</div>
									</div>
						<?php }
							}
						} ?>
					</div>
				</form>
			</div>

			<div class="col-lg-9 col-sm-8 ">

				<h2><?= $anuncio[0]->TITULO_ANUNCIO ?></h2>
				<div class="row">
					<div class="col-lg-8">
						<div class="property-images">
							<!-- Slider Starts -->
							<div id="myCarousel" class="carousel slide" data-ride="carousel">
								<!-- Indicators -->
								<ol class="carousel-indicators hidden-xs">
									<?php $cont2 = 0;
									foreach ($fotos as $f) { ?>
										<?php if (($f->TIPO_FOTO == 1) && ($f->ESTADO_FOTO == 1)) { ?>
											<li data-target="#myCarousel" data-slide-to="<?= $cont2 ?>" class="<?php if ($cont2 == 0) {
																													echo "active";
																												} ?>"></li>
										<?php } ?>

									<?php $cont2++;
									} ?>
								</ol>
								<div class="carousel-inner">
									<?php $cont = 0;
									foreach ($fotos as $f) { ?>
										<?php if ($f->TIPO_FOTO == 1) { ?>
											<?php if ($f->ESTADO_FOTO == 1) { ?>
												<div class="item <?php if ($cont == 0) {
																		echo "active";
																	} ?>">
													<img src="<?php echo base_url('uploads/files/' . $f->NOMB_FOTO) ?>" class="properties cover-img-descripcion" alt="properties" />
												</div>
											<?php } ?>
										<?php } else {
											$var = $f->NOMB_FOTO;
										} ?>
									<?php $cont++;
									} ?>
								</div>

								<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
								<a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
							</div>
							<!-- #Slider Ends -->
						</div>

						<div class="spacer">
							<h4><span class="glyphicon glyphicon-th-list"></span>Caracteristicas Generales</h4>
							<p><?= $anuncio[0]->DESCRIP_ANUNCIO ?></p>

							<h4><span class="glyphicon glyphicon-th-list"></span>Caracteristicas del Departamento</h4>
							<p><?= $anuncio[0]->DESCRIP_INMUEBLE ?></p>


							<table class="table table-borderless table-striped">
								<tbody>
									<tr>
										<td style="width: 40%;"><strong>Piso:</strong></td>
										<td><?= $anuncio[0]->PISO ?></td>
									</tr>
									<tr>
										<td><strong>Dirección:</strong></td>
										<td><?= $anuncio[0]->direccion_inmueble ?></td>
									</tr>
									<tr>
										<td><strong>Nro de Dirección:</strong></td>
										<td><?= $anuncio[0]->NRO_DIRECCION ?></td>
									</tr>
									<tr>
										<td><strong>Nro de Habitaciones:</strong></td>
										<td><?= $anuncio[0]->NRO_HABITACIONES ?></td>
									</tr>
									<tr>
										<td><strong>Nro de Baños:</strong></td>
										<td><?= $anuncio[0]->NRO_BAÑOS ?></td>
									</tr>
									<tr>
										<td><strong>Metros Cuadrados:</strong></td>
										<td><?= $anuncio[0]->METROS_CUADRADOS ?></td>
									</tr>
									<tr>
										<td><strong>Servicios del Inmueble:</strong></td>
										<td><?= $anuncio[0]->SERVICIOS_INMUEBLE ?></td>
									</tr>
									<tr>
										<td><strong>Ubicación:</strong></td>
										<td><?= $anuncio[0]->DESCRIP_INMUEBLE ?></td>
									</tr>
								</tbody>
							</table>

						</div>

						<div>
							<h4><span class="glyphicon glyphicon-map-marker"></span> Localizacion</h4>
							<div class="well" id="map" style="width:100%;height:400px">
								<input type="text" value="<?= $anuncio[0]->direccion_inmueble ?>" id="direccion">
								<input type="text" value="<?= $anuncio[0]->NRO_DIRECCION ?>" id="numdireccion">
								<?php foreach ($distrito as $d) { ?>	
									<?php if($d->ID_DISTRITO == $anuncio[0]->ID_DISTRITO) { ?>		
										<input type="text" value="<?= $anuncio[0]->NOMB_DISTRITO ?>" id="distrito">
									<?php } ?>		
								<?php } ?>
								<!-- <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Pulchowk,+Patan,+Central+Region,+Nepal&amp;aq=0&amp;oq=pulch&amp;sll=37.0625,-95.677068&amp;sspn=39.371738,86.572266&amp;ie=UTF8&amp;hq=&amp;hnear=Pulchowk,+Patan+Dhoka,+Patan,+Bagmati,+Central+Region,+Nepal&amp;ll=27.678236,85.316853&amp;spn=0.001347,0.002642&amp;t=m&amp;z=14&amp;output=embed"></iframe> -->
							</div>
						</div>

					</div>

					<div class="col-lg-4">
						<div class="col-lg-12  col-sm-6">
							<div class="property-info">
								<p class="price">$ <?= $anuncio[0]->PRECIO_MES ?></p>
								<p class="area"><span class="glyphicon glyphicon-map-marker"></span>
									<?= $anuncio[0]->NRO_DIRECCION ?> <?= $anuncio[0]->DIRECCION ?></p>

								<div class="profile">
									<span class="glyphicon glyphicon-user"></span> Detalles del Arrendador
									<p><?= $anuncio[0]->NOMB_PERSONA ?>
										<?= $anuncio[0]->APE_PERSONA ?><br><?= $anuncio[0]->CELULAR ?></p>
								</div>

								<?php if (isset($var)) { ?>
									<h6><a onclick="visualizar_recorrido('<?= $var ?>');" class="btn btn-primary">Recorrido
											360°</a></h5>
									<?php } ?>

									<h5><a href="#" class="btn btn-info">Contactar</a></h5>

							</div>

							<h6><span class="glyphicon glyphicon-thumbs-up"></span> Valoracion</h6>
							<div class="listing-detail">
								<a onclick="valoracion('5','<?= $anuncio[0]->ID_ANUNCIO ?>');"><span class="valoracion <?php if ($resultado_valoracion == 5) { ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Bueno">5</span></a>
								<a onclick="valoracion('4','<?= $anuncio[0]->ID_ANUNCIO ?>');"><span class="valoracion <?php if ($resultado_valoracion == 4) { ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Bueno">4</span></a>
								<a onclick="valoracion('3','<?= $anuncio[0]->ID_ANUNCIO ?>');"><span class="valoracion <?php if ($resultado_valoracion == 3) { ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Normal">3</span></a>
								<a onclick="valoracion('2','<?= $anuncio[0]->ID_ANUNCIO ?>');"><span class="valoracion <?php if ($resultado_valoracion == 2) { ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Malo">2</span></a>
								<a onclick="valoracion('1','<?= $anuncio[0]->ID_ANUNCIO ?>');"><span class="valoracion <?php if ($resultado_valoracion == 1) { ?> active <?php } ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Muy Malo">1</span></a>
							</div>
						</div>
						<div class="col-lg-12 col-sm-6 ">
							<div class="enquiry">
								<h6><span class="glyphicon glyphicon-envelope"></span> Enviar Mensaje</h6>
								<input type="hidden" id="id_inmueble" name="id_inmueble" value="<?= $anuncio[0]->ID_ANUNCIO ?>">
								<span id="error_nombre_interesado" class="text-danger"></span>
								<input type="text" id="nombre_interesado" name="nombre_interesado" required class="form-control" placeholder="Ingrese su nombre" />

								<span id="error_correo_interesado" class="text-danger"></span>
								<input type="text" id="correo_interesado" name="correo_interesado" class="form-control" required placeholder="correo@virtual.room" />

								<span id="error_telefono_interesado" class="text-danger"></span>
								<input type="text" id="telefono_interesado" name="telefono_usuario" class="form-control" required placeholder="Numero telefonico min 9 max 11" />

								<span id="error_mensaje_interesado" class="text-danger"></span>
								<textarea id="mensaje_interesado" name="mensaje_interesado" rows="6" class="form-control" required placeholder="Cual es el interes por el departamento?"></textarea>

								<button type="button" id="personaInteresada" mame="personaInteresada" class="btn btn-primary">Enviar Mensaje</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>