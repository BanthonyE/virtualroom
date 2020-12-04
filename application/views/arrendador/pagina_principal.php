<div id="page-content">
	<!-- Datatables Header -->
	<div class="content-header">
		<div class="header-section">
			<h1>
				<i class="fa fa-table"></i>Bienvenido<br><small></small>
			</h1>
		</div>
	</div>
	<ul class="breadcrumb breadcrumb-top">
		<li>Inicio</li>
	</ul>
	<!-- END Datatables Header -->

	<div>
		<center>
			<div id="page-content">
				<!-- eCommerce Customer Header -->
				<div class="content-header">
					<ul class="nav-horizontal text-center">
						<li class="active">
							<a href="#"><i class="fa fa-user"></i> Mi Perfil</a>
						</li>
					</ul>
				</div>
				<!-- END eCommerce Customer Header -->

				<!-- Customer Content -->
				<div class="row">
					<div class="col-lg-4">
						<!-- Customer Info Block -->
						<div class="block">
							<!-- Customer Info Title -->
							<div class="block-title">
								<h2><i class="fa fa-user"></i>Mi <strong>Perfil</strong></h2>
							</div>
							<!-- END Customer Info Title -->

							<!-- Customer Info -->
							<div class="block-section text-center">
								<div class="sidebar-user-imagen">
									<?php
									$image_properties = array('src' => 'uploads/fotos/' . $foto_usuario, 'height' => '90');
									echo img($image_properties);
									?>

								</div>
								<br><br><br><br><br>
								<h3>
									<strong><?= $nombre_usuario ?></strong><br><small></small>
								</h3>
							</div>
							<table class="table table-borderless table-striped table-vcenter">
								<tbody>
									<tr>
										<td class="text-right" style="width: 50%;"><strong>Usuario</strong></td>
										<td><span class="label label-primary"><?php if ($usuario[0]->ID_TIPOUSUARIO == 2) { ?>
													Arrendador <?php }elseif ($usuario[0]->ID_TIPOUSUARIO == 3) { ?>
													Arrendatario <?php } else { ?> Administrador <?php
																							} ?></span></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Nombre</strong></td>
										<td><?= $usuario[0]->NOMB_PERSONA ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Apellido</strong></td>
										<td><?= $usuario[0]->APE_PERSONA ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>DNI</strong></td>
										<td><?= $usuario[0]->NRO_DOCUMENTO ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Sexo</strong></td>
										<td><?= $usuario[0]->SEXO ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Celular</strong></td>
										<td><?= $usuario[0]->CELULAR ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Dirección</strong></td>
										<td><?= $usuario[0]->DIRECCION ?></td>
									</tr>
									<tr>
										<td class="text-right"><strong>Email</strong></td>
										<td><?= $usuario[0]->EMAIL ?></td>
									</tr>
								</tbody>
							</table>
							<!-- END Customer Info -->
						</div>
						<!-- END Customer Info Block -->

					</div>
					<div class="col-lg-8">
						<!-- Orders Block -->
						<div class="block">
							<!-- Orders Title -->
							<div class="block-title">
								<h2><i class="fa fa-edit"></i> <strong>Editar mi perfil</strong></h2>
							</div>
							<!-- END Orders Title -->

							<!-- Meta Data Content -->
							<form action="editar-perfil" enctype="multipart/form-data" method="post" accept-charset="utf-8">
								<div class="form-horizontal form-bordered">
									<div class="form-group">
										<label class="col-md-3 control-label">Nombres</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtnombre" class="form-control" <?php if ($usuario[0]->NOMB_PERSONA == NULL) { ?> placeholder="Ingresar nombres" <?php } else { ?> placeholder=" <?= $usuario[0]->NOMB_PERSONA ?> " <?php } ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Apellidos</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtapellido" class="form-control" <?php if ($usuario[0]->APE_PERSONA == NULL) { ?> placeholder="Ingresar apellidos" <?php } else { ?> placeholder="<?= $usuario[0]->APE_PERSONA ?> " <?php } ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Tipo de documento</label>
										<div class="col-md-8">
											<select id="product-category" name="cbotipo_documento" class="select-chosen" style="width: 250px;" <?php if ($usuario[0]->NOMB_TIPODOCUMENTO == NULL) { ?> data-placeholder="Seleccionar Condición.." <?php } else { ?> data-placeholder="<?= $usuario[0]->NOMB_TIPODOCUMENTO ?> " <?php } ?>>
												<option></option>
												<option value="1">Dni</option>
												<option value="2">Carnet de extranjería</option>
												<option value="3">Pasaporte</option>
												<option value="4">Partida de nacimiento</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Número de documento</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtdni" class="form-control" <?php if ($usuario[0]->NRO_DOCUMENTO == NULL) { ?> placeholder="Ingresar DNI" <?php } else { ?> placeholder="<?= $usuario[0]->NRO_DOCUMENTO ?>" <?php } ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Sexo</label>
										<div class="col-md-8">
											<select id="product-category" name="cbosexo" class="select-chosen" style="width: 250px;" <?php if ($usuario[0]->SEXO == NULL) { ?> data-placeholder="Seleccionar Condición.." <?php } else { ?> data-placeholder="<?= $usuario[0]->SEXO ?> " <?php } ?>>
												<option></option>
												<option value="Masculino">Masculino</option>
												<option value="Femenino">Femenino</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Celular</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtcel" class="form-control" <?php if ($usuario[0]->CELULAR == NULL) { ?> placeholder="Ingresar celular" <?php } else { ?> placeholder=<?= $usuario[0]->CELULAR ?> <?php } ?>>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Dirección</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtdireccion" class="form-control" <?php if ($usuario[0]->DIRECCION == NULL) { ?> placeholder="Ingresar dirección" <?php } else { ?> placeholder="<?= $usuario[0]->DIRECCION ?> " <?php } ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Email</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtemail" class="form-control" <?php if ($usuario[0]->EMAIL == NULL) { ?> placeholder="Ingresar email" <?php } else { ?> placeholder=<?= $usuario[0]->EMAIL ?> <?php } ?>>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Nombre de Usuario</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtusu" class="form-control" <?php if ($usuario[0]->NOMB_USUARIO == NULL) { ?> placeholder="Ingresar Nombre de usuario" <?php } else { ?> placeholder="<?= $usuario[0]->NOMB_USUARIO ?>" <?php } ?>>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-3 control-label">Contraseña</label>
										<div class="col-md-9">
											<input type="text" id="product-name" name="txtpass" class="form-control" <?php if ($usuario[0]->PASS_USUARIO == NULL) { ?> placeholder="Ingresar contraseña" <?php } else { ?> placeholder="<?= $usuario[0]->PASS_USUARIO ?> " <?php } ?>>
										</div>
									</div>

									<div class="form-group">
										<label class="col-md-3 control-label">Foto</label>
										<div class="col-md-9">
											<input type='file' name='file' />
										</div>
									</div>

									<div class="form-group form-actions">
										<div class="col-md-9 col-md-offset-3">
											<button type="submit" name="upload" onclick="return confirm('¿Estas seguro de Modificar tus datos?')" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o"></i> Guardar</button>
										</div>
									</div>
								</div>
								<!-- END Meta Data Content -->
							</form>
						</div>
						<!-- END Orders Block -->
					</div>
				</div>
				<!-- END Customer Content -->
			</div>
			<!-- END Page Content -->
		</center>
	</div>

</div>
<!-- END Page Content -->