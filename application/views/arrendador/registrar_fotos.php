<!-- Page content -->
<div id="page-content">
	<div class="content-header">
		<ul class="nav-horizontal text-center">
			<li class="<?php if ($this->uri->segment(1) == 'registrar-fotos') { ?> active <?php } ?>">
				<a href="#"><i class="fa fa-user"></i> Administrar Fotos</a>
			</li>
			<li class="<?php if ($this->uri->segment(1) == 'galeria-publicacion') { ?> active <?php } ?>">
				<a href="galeria-publicacion"><i class="fa fa-user"></i> Galería de fotos</a>
			</li>
		</ul>
	</div>

	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="block">
				<div class="block-title text-center">
					<h2><i class="fa fa-google"></i> Elija el <strong>Departamento</strong></h2>
				</div>
				<select id="cboinmueble" name="cboinmueble" class="select-chosen" data-placeholder="Seleccionar Categoría.." style="width: 250px;">
					<option></option>
					<?php foreach ($departamentos as $u) : ?>
						<option value="<?= $u->ID_INMUEBLE ?>"><?= $u->NOMB_INMUEBLE ?></option>
					<?php endforeach; ?>
				</select>
				<br>
				<br>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<!-- Meta Data Block -->
			<div class="block divregistrarfotos" id="divregistrarfotos" name="divregistrarfotos" style="display:none;">
				<!-- Meta Data Title -->
				<div class="block-title">
					<h2><i class="fa fa-google"></i> <strong>Registrar</strong> Fotos de inmuebles
					</h2>
					<p><?php echo $this->session->flashdata('statusMsg'); ?></p>
				</div>
				<!-- END Meta Data Title -->

				<!-- Meta Data Content -->
				<form enctype="multipart/form-data" action="registrar-foto-inmueble" method="post">

					<input type="hidden" name="id_inmueble" id="id_inmueble" value="">

					<div class="form-horizontal form-bordered">

						<div class="form-group">
							<label class="col-md-3 control-label" for="product-category">Tipo de
								Foto</label>
							<div class="col-md-8">
								<select class="select-chosen" id="product-category" name="cbotipo_foto" title='cbotipo_foto' data-placeholder="Seleccionar Tipo de foto.." style="width: 250px;" required>
									<option></option>
									<option value="clasica"> Clasica</option>
									<option value="noclasica"> Vista 360°</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="form-group">
								<label class="col-md-3 control-label" for="product-name">Ingresar Fotos: </label>
								<div class="col-md-9">
									<!-- <input type='file' name='file' /> -->
									<input type="file" required class="form-control" name="userFiles[]" multiple />
								</div>
							</div>
						</div>
						<div class="form-group form-actions">
							<div class="col-md-9 col-md-offset-3">
								<button type="submit" onclick="return confirm('¿Estas seguro de Registrar?')" class="btn btn-sm btn-primary" name="fileSubmit"><i class="fa fa-floppy-o"></i> Guardar</button>
								<button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
							</div>
						</div>
					</div>
				</form>
				<!-- END Meta Data Content -->
			</div>
			<!-- END Meta Data Block -->
		</div>

		<div id="vista_dep" name="vista_dep">

		</div>
	</div>

	<!-- END Product Edit Content -->
</div>
<!-- END Page Content -->