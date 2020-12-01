<div class="container">
	<div class="spacer">
		<div class="row register">
		<form method="post" id="fac_form" name="form">
			<div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">

				<input type="hidden" name="tipo_usuario" value="4">

				<span id="error_nombre_usuario" class="text-danger"></span>
				<input type="text" class="form-control" placeholder="Nombre de Usuario" name="nombre_usuario" id="nombre_usuario">
				
				<span id="error_password" class="text-danger"></span>
				<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password">

				<span id="error_r_password" class="text-danger"></span>
				<input type="password" class="form-control" placeholder="Confirmar contraseña" name="r_password" id="r_password">


				<span id="error_tipo_documento" class="text-danger"></span>
				<select class="form-control" name="tipo_documento" id="tipo_documento">
					<option>Elegir tipo de documento</option>
					<option>DNI</option>
					<option>Carnet de extranjería</option>
					<option>Partida de nacimiento</option>
					<option>Pasaporte</option>
				</select>

				<span id="error_numero_documento" class="text-danger"></span>
				<input type="text" class="form-control" disabled="disabled" placeholder="Ingrese el Nro de su documento" name="numero_documento" id="numero_documento">

				<span id="error_nombre_completo" class="text-danger"></span>
				<input type="text" class="form-control" placeholder="Nombre completo" name="nombre_completo" id="nombre_completo">

				<span id="error_apellido_completo" class="text-danger"></span>
				<input type="text" class="form-control" placeholder="Apellido completo" name="apellido_completo" id="apellido_completo">


				<span id="error_genero" class="text-danger"></span>
				<select class="form-control" name="genero" id="genero">
					<option>Elegir género</option>
					<option>Masculino</option>
					<option>Femenino</option>
				</select>

				<span id="error_celular" class="text-danger"></span>
				<input type="number" class="form-control" placeholder="Ingresar celular" name="celular" id="celular">

				<span id="error_direccion" class="text-danger"></span>
				<input type="text" class="form-control" placeholder="Ingresar dirección" name="direccion" id="direccion">

				<span id="error_email" class="text-danger"></span>
				<input type="text" class="form-control" placeholder="Ingresar Email" name="email" id="email">

				<button type="button" class="btn btn-success" name="btn_registrar_usuario" id="btn_registrar_usuario">Registrarme</button>
			</div>
		</form>
		</div>
	</div>
</div>
