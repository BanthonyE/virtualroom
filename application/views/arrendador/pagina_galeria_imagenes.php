<!-- Page content -->
<div id="page-content">
	<div class="content-header">
		<ul class="nav-horizontal text-center">
			<li class="<?php if($this->uri->segment(1)=='galeria-imagenes'){ ?> active <?php } ?>">
				<a href="galeria-imagenes"><i class="fas fa-photo-video"></i> Galería de Imágenes</a>
			</li>
		</ul>
	</div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Galería de Imágenes</li>
        <li><a href="">Descripción del anuncio / Imágenes</a></li>
    </ul>
	<div class="row">       
		<div class="col-sm-3"></div>
		<div class="col-sm-3">
			<div class="block">
				<div class="block-title text-center">
					<h2><i class="fa fa-google"></i> Elija el <strong>Departamento</strong></h2>
				</div>
                <select id="cboinmueble" name="cboinmueble" class="select-chosen" data-placeholder="Seleccionar Inmueble.." style="width: 250px;">
                    <option></option>
                    <?php foreach ($inmueble as $u) : ?>
                        <option value="<?= $u->ID_INMUEBLE ?>"><?= $u->NOMB_INMUEBLE ?></option>
                    <?php endforeach; ?>
                </select>
				<br>
				<br>
			</div>
		</div>
		<div class="col-sm-3">
			<div class="block">
				<div class="block-title text-center">
					<h2><i class="fa fa-google"></i> Elija el <strong>Anuncio</strong></h2>
				</div>

                <div style="display:none;" class="div2">
                    <select name='cboanuncio' id='cboanuncio' class='form-control' required>
                    </select>
                </div>
                <div class="div1">
                    <select class="select-chosen" data-placeholder="Seleccionar Anuncio.." style="width: 250px;" disabled>
                        <option></option>
                    </select>
                </div>
				<br>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>

<div class="vista">

</div>

<div class="block vistainfo" id="vistainfo" style="height:360px;">
	<div class="block-title text-center">
		<h2></h2>
	</div>
	<div class="alert alert-success text-center">
		<h3>Elija el departamento y el anuncio para visualizar la galería de imágenes</h3>            
	</div><br>
	<h1 class="text-center"><i class="gi gi-circle_info fa-4x text-success"></i></h1>
</div>
<!-- END Datatables Content -->
</div>
<!-- END Page Content -->
