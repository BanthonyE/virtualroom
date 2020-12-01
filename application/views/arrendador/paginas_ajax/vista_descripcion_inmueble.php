
<link rel="stylesheet" href="<?php base_url() ?>assets/css/css1/plugins.css">

<!-- Second Column -->
<div class="col-md-6 col-lg-6">
	<!-- Info Block -->
	<div class="block">
		<div class="block-title">
			<div class="block-options pull-right">
			</div>
			<h2>Descripción del <strong>Inmueble</strong></h2>
		</div>
		<!-- Info Content -->
		<table class="table table-borderless table-striped">
			<tbody>
				<tr>
					<td style="width: 40%;"><strong>Nombre del Departamento</strong></td>
					<td><?=$inmueble[0]->NOMB_INMUEBLE?></td>
				</tr>
				<tr>
					<td><strong>Descripción:</strong></td>
					<td><?=$inmueble[0]->DESCRIP_INMUEBLE?></td>
				</tr>
				<tr>
					<td><strong>Piso:</strong></td>
					<td><?=$inmueble[0]->PISO?></td>
				</tr>
				<tr>
					<td><strong>Dirección:</strong></td>
					<td><?=$inmueble[0]->DIRECCION?></td>
				</tr>
				<tr>
					<td><strong>Nro de Dirección:</strong></td>
					<td><?=$inmueble[0]->NRO_DIRECCION?></td>
				</tr>
				<tr>
					<td><strong>Nro de Habitaciones:</strong></td>
					<td><?=$inmueble[0]->NRO_HABITACIONES?></td>
				</tr>
				<tr>
					<td><strong>Nro de Baños:</strong></td>
					<td><?=$inmueble[0]->NRO_BAÑOS?></td>
				</tr>
				<tr>
					<td><strong>Metros Cuadrados:</strong></td>
					<td><?=$inmueble[0]->METROS_CUADRADOS?></td>
				</tr>
				<tr>
					<td><strong>Precio Mensual:</strong></td>
					<td>
						<a href="javascript:void(0)" class="label label-success"><?=$inmueble[0]->PRECIO_MES?></a>
					</td>
				</tr>
				<tr>
					<td><strong>Servicios del Inmueble:</strong></td>
					<td><?=$inmueble[0]->SERVICIOS_INMUEBLE?></td>
				</tr>
				<tr>
					<td><strong>Ubicación:</strong></td>
					<td><?=$inmueble[0]->DESCRIP_INMUEBLE?></td>
				</tr>
			</tbody>
		</table>
		<!-- END Info Content -->
	</div>

</div>
<!-- END Second Column -->

<div class="col-md-6">
	<div class="block">
		<div class="block-title">
			<h2>Fotos de inmuebles<strong> Activas</strong></h2>
		</div>
		<div class="gallery" data-toggle="lightbox-gallery">
			<div class="row">
				<?php foreach($fotos as $f): if(($f->ESTADO_FOTO==1)&&($f->TIPO_FOTO==1)){?>
					<input type="hidden" class="foto_estado_activado" value=<?=$f->ESTADO_FOTO?>>
					<div class="col-sm-4 gallery-image">
						<img src="<?php echo base_url('uploads/files/'.$f->NOMB_FOTO); ?>">
						<div class="gallery-image-options text-center">
							<div class="btn-group btn-group-sm">
								<a href="<?php echo base_url('uploads/files/'.$f->NOMB_FOTO); ?>"
									class="gallery-link btn btn-sm btn-alt btn-default" title="Image Info">View</a>
								<button id="btnFoto<?=$f->NOMB_FOTO?>" name="btnFoto<?=$f->NOMB_FOTO?>"
									class="btn btn-sm btn-alt btn-default" onclick="funcionDesactivar(<?= $f->ID_FOTO ?>);"
									data-toggle="tooltip" title="Desactivar"><i class="fa fa-minus-circle"></i></button>
							</div>
						</div>
					</div>
				<?php } endforeach; ?>
			</div>
		</div>
	</div>
</div>
<div class="col-md-6">
	<div class="block">
		<div class="block-title">
			<h2>Fotos de inmuebles<strong> Inactivas</strong></h2>
		</div>
		<div class="gallery" data-toggle="lightbox-gallery">
			<div class="row">


				<?php foreach($fotos as $f): if(($f->ESTADO_FOTO==0)&&($f->TIPO_FOTO==1)){?>
				<input type="hidden" class="foto_estado_desactivado" value=<?=$f->ESTADO_FOTO?>>
				<div class="col-sm-4 gallery-image">
					<img src="<?php echo base_url('uploads/files/'.$f->NOMB_FOTO); ?>">
					<div class="gallery-image-options text-center">
						<div class="btn-group btn-group-sm">
							<a href="<?php echo base_url('uploads/files/'.$f->NOMB_FOTO); ?>"
								class="gallery-link btn btn-sm btn-alt btn-default" title="Image Info">View</a>
							<button id="btnFoto<?=$f->NOMB_FOTO?>" name="btnFoto<?=$f->NOMB_FOTO?>"
								class="btn btn-sm btn-alt btn-default" onclick="funcionActivar(<?= $f->ID_FOTO ?>);"
								data-toggle="tooltip" title="Activar"><i class="fa fa-plus-circle"></i></button>

							<button id="btnEliminarFoto" name="btnEliminarFoto"
								class="btn btn-sm btn-alt btn-default" onclick="btnEliminarFoto(<?= $f->ID_FOTO ?>);"
								data-toggle="tooltip" title="Eliminar"><i class="fa fa-trash-o"></i></button>
						</div>
					</div>
				</div>
				<?php } endforeach; ?>
			</div>
		</div>
	</div>
</div>
</div>


	
<script>
	function funcionDesactivar($var) {
		let foto = $var;

		let estado = $('.foto_estado_activado').val();
		let inmueble = $('#cboinmueble').val();
		Swal.fire({
			title: '¿Está seguro desactivar la foto?',
			text: "Las fotos desactivadas no se mostrarán en los anuncios",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: "ActualizarFotos",
					data: {
						foto: foto,
						estado: estado,
						inmueble: inmueble
					},
					success: function (data) {
						$('#vista_dep').html(data);
					}
				});
			}
        });
	}

	function funcionActivar($var) {
		let foto = $var;

		let estado = $('.foto_estado_desactivado').val();
		let inmueble = $('#cboinmueble').val();

		Swal.fire({
			title: '¿Está seguro activar la foto?',
			text: "Las fotos activadas se mostrarán en los anuncios",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {
				$.ajax({
					type: 'POST',
					url: "ActualizarFotos",
					data: {
						foto: foto,
						estado: estado,
						inmueble: inmueble
					},
					success: function (data) {
						$('#vista_dep').html(data);
					}
				});
			}
        });

	}
	function btnEliminarFoto($var) {

		let foto = $var;
		let inmueble = $('#cboinmueble').val();

		Swal.fire({
			title: '¿Está seguro eliminar la foto?',
			text: "Las fotos borradas no se podrán recuperar.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {
				$.ajax({
				type: 'POST',
				url: "BorrarFotos",
				data: {
					foto: foto,
					inmueble: inmueble
				},
				success: function (data) {
					$('#vista_dep').html(data);
				}
			});
			}
        });
	}

</script>

<script src="<?php base_url() ?>assets/js/js1/ap.js" type="text/javascript"></script>