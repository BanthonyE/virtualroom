<div class="container">
	<div class="properties-listing spacer">

		<div class="row">
			<div class="col-lg-3 col-sm-4 ">
			<br>				
				<div class="hot-properties hidden-xs">
					<h4>Recomendados</h4>
					<form action="detalle-anuncio" method="POST">
						<?php $cont=0;
						foreach ($anuncio as $a) {?>

							<div class="row">
								<div class="col-lg-4 col-sm-5"><img src="<?php echo base_url('uploads/files/' . $a->NOMB_FOTO) ?>" class="img-responsive img-circle" alt="properties">
								</div>
								<div class="col-lg-8 col-sm-7">
									<p class="price"> Ubicacion : <?= $a->DIRECCION ?>, <?php echo strtolower("" . $a->NOMB_DISTRITO) ?> </p>
									<p class="price"> Precio : s/. <?= $a->PRECIO_MES ?></p>
									<h5>
										<button class="btn btn-primary" id="btnDetalle" name="btnDetalle" type="submit" value="<?= $a->ID_ANUNCIO ?>">Ver Detalle</button>
									</h5>
								</div>
							</div>

						<?php if($cont==2){break;}
						$cont++; } ?>
					</form>
				</div>
			</div>
			<div class="col-lg-9 col-sm-8">
				<div class="sortby clearfix">
				<br>

				</div>
				<div class="row">

					<form action="detalle-anuncio" method="POST">


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
							<div class="col-lg-4 col-sm-6">
								<div class="properties">
									<input type="hidden" name="id_anuncio" value="1">
									<div class="image-holder"><img class="cover-img" src="<?php echo base_url('uploads/files/' . $a->NOMB_FOTO) ?>" class="img-responsive img-anuncios" alt="properties" />
									</div>
									<h4>
										<a href="detalle-anuncio"><?= $a->TITULO_ANUNCIO ?></a>
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
							</div>
						<?php } ?>

					</form>
				</div>
				<!-- properties -->
				<!-- properties -->

				<!-- properties -->
				<div class="row">
					<div class="center">
						<ul class="pagination">
							<li><a href="#">«</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">»</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>