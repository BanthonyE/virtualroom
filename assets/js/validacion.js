$('#btn_registrar_usuario').click(function () {
	if ($.trim($('#nombre_usuario').val()).length == 0) {
		error_nombre_usuario = 'Ingrese el nombre de usuario';
		$('#error_nombre_usuario').text(error_nombre_usuario);
		$('#nombre_usuario').addClass('has-error');
	} else {
		error_nombre_usuario = '';
		$('#error_nombre_usuario').text(error_nombre_usuario);
		$('#nombre_usuario').removeClass('has-error');
	}

	if ($.trim($('#password').val()).length == 0) {
		error_password = 'Ingrese la contraseña';
		$('#error_password').text(error_password);
		$('#password').addClass('has-error');
	} else {
		error_password = '';
		$('#error_password').text(error_password);
		$('#password').removeClass('has-error');
	}

	if ($.trim($('#r_password').val()) == 0) {
		error_r_password = 'Ingrese la contraseña de validación';
		$('#error_r_password').text(error_r_password);
		$('#r_password').addClass('has-error');
	} else if ($.trim($('#password').val()) !== $.trim($('#r_password').val())) {
		error_r_password = 'Las Contraseñas no coinciden';
		$('#error_r_password').text(error_r_password);
		$('#r_password').addClass('has-error');
	} else {
		error_r_password = '';
		$('#error_r_password').text(error_r_password);
		$('#r_password').removeClass('has-error');
	}

	if ($.trim($('#tipo_documento').val()) == 'Elegir tipo de documento') {
		error_tipo_documento = 'Seleccionar el tipo de documento';
		$('#error_tipo_documento').text(error_tipo_documento);
		$('#tipo_documento').addClass('has-error');
	} else {
		error_tipo_documento = '';
		$('#error_tipo_documento').text(error_tipo_documento);
		$('#tipo_documento').removeClass('has-error');
	}

	if ($.trim($('#numero_documento').val()).length == 0) {
		error_numero_documento = 'Ingrese número de documento';
		$('#error_numero_documento').text(error_numero_documento);
		$('#numero_documento').addClass('has-error');
	} else {
		error_numero_documento = '';
		$('#error_numero_documento').text(error_numero_documento);
		$('#numero_documento').removeClass('has-error');
	}

	if ($.trim($('#nombre_completo').val()).length == 0) {
		error_nombre_completo = 'Ingrese su nombre completo';
		$('#error_nombre_completo').text(error_nombre_completo);
		$('#nombre_completo').addClass('has-error');
	} else {
		error_nombre_completo = '';
		$('#error_nombre_completo').text(error_nombre_completo);
		$('#nombre_completo').removeClass('has-error');
	}

	if ($.trim($('#apellido_completo').val()).length == 0) {
		error_apellido_completo = 'Ingrese su apellido completo';
		$('#error_apellido_completo').text(error_apellido_completo);
		$('#apellido_completo').addClass('has-error');
	} else {
		error_apellido_completo = '';
		$('#error_apellido_completo').text(error_apellido_completo);
		$('#apellido_completo').removeClass('has-error');
	}

	if ($.trim($('#genero').val()) == 'Elegir género') {
		error_genero = 'Elija su género';
		$('#error_genero').text(error_genero);
		$('#genero').addClass('has-error');
	} else {
		error_genero = '';
		$('#error_genero').text(error_genero);
		$('#genero').removeClass('has-error');
	}

	if ($.trim($('#celular').val()).length == 0) {
		error_celular = 'Ingrese su número de celular o teléfono';
		$('#error_celular').text(error_celular);
		$('#celular').addClass('has-error');
	} else {
		error_celular = '';
		$('#error_celular').text(error_celular);
		$('#celular').removeClass('has-error');
	}

	if ($.trim($('#direccion').val()).length == 0) {
		error_direccion = 'Ingrese su dirección';
		$('#error_direccion').text(error_direccion);
		$('#direccion').addClass('has-error');
	} else {
		error_direccion = '';
		$('#error_direccion').text(error_direccion);
		$('#direccion').removeClass('has-error');
	}

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ($.trim($('#email').val()).length == 0) {
		error_email = 'Ingrese su E-mail';
		$('#error_email').text(error_email);
		$('#email').addClass('has-error');
	} else {
		if (!filter.test($('#email').val())) {
			error_email = 'E-mail inválido';
			$('#error_email').text(error_email);
			$('#email').addClass('has-error');
		} else {
			error_email = '';
			$('#error_email').text(error_email);
			$('#email').removeClass('has-error');
		}
	}

	if (error_nombre_usuario !== '' || error_password !== '' || error_r_password !== '' || error_tipo_documento !== '' || error_numero_documento !== '' || error_nombre_completo !== '' || error_apellido_completo !== '' || error_genero !== '' || error_celular !== '' || error_direccion !== '' || error_email !== '') {
		Swal.fire({
			title: 'Ingrese los datos correctamente',
			text: "Verifique sus datos en los campos de texto",
			icon: 'warning',
			confirmButtonText: `OK`
		})
	} else {
		Swal.fire({
			title: '¿Estás seguro de registrarte?',
			text: "Tus datos se guardarán de manera privada en el sistema.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {
				document.form.action = "signup_usuario";
				document.form.method = "POST";
				document.form.submit();
			}
        });
        

	}

});

