$('#personaInteresada').click(function () {
	if ($.trim($('#nombre_interesado').val()).length == 0) {
		error_nombre_interesado = 'Ingrese su nombre';
		$('#error_nombre_interesado').text(error_nombre_interesado);
		$('#nombre_interesado').addClass('has-error');
	} else {
		error_nombre_interesado = '';
		$('#error_nombre_interesado').text(error_nombre_interesado);
		$('#nombre_interesado').removeClass('has-error');
	}

	if ($.trim($('#telefono_interesado').val()).length == 0) {
		error_telefono_interesado = 'Ingrese su número de celular o teléfono';
		$('#error_telefono_interesado').text(error_telefono_interesado);
		$('#telefono_interesado').addClass('has-error');
	} else {
		error_telefono_interesado = '';
		$('#error_telefono_interesado').text(error_telefono_interesado);
		$('#telefono_interesado').removeClass('has-error');
    }

	if ($.trim($('#mensaje_interesado').val()).length == 0) {
		error_mensaje_interesado = 'Ingrese su mensaje';
		$('#error_mensaje_interesado').text(error_mensaje_interesado);
		$('#mensaje_interesado').addClass('has-error');
	} else {
		error_mensaje_interesado = '';
		$('#error_mensaje_interesado').text(error_mensaje_interesado);
		$('#mensaje_interesado').removeClass('has-error');
    }
    
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ($.trim($('#correo_interesado').val()).length == 0) {
		error_correo_interesado = 'Ingrese su E-mail';
		$('#error_correo_interesado').text(error_correo_interesado);
		$('#correo_interesado').addClass('has-error');
	} else {
		if (!filter.test($('#correo_interesado').val())) {
			error_correo_interesado = 'E-mail inválido';
			$('#error_correo_interesado').text(error_correo_interesado);
			$('#correo_interesado').addClass('has-error');
		} else {
			error_correo_interesado = '';
			$('#error_correo_interesado').text(error_correo_interesado);
			$('#correo_interesado').removeClass('has-error');
		}
	}

	if (error_nombre_interesado !== '' || error_correo_interesado !== '' || error_telefono_interesado !== '' || error_mensaje_interesado !== '') {
		Swal.fire({
			title: 'Ingrese los datos correctamente',
			text: "Verifique sus datos en los campos de texto",
			icon: 'warning',
			confirmButtonText: `OK`
		})
	} else {
		Swal.fire({
			title: '¿Está seguro de enviar el mensaje?',
			text: "Tu mensaje será leído por el dueño del inmueble en su bandeja de entrada.",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {

                let nombre_interesado = $('#nombre_interesado').val();
                let telefono_interesado = $('#telefono_interesado').val();
                let mensaje_interesado = $('#mensaje_interesado').val();
                let correo_interesado = $('#correo_interesado').val();
                let id_inmueble = $('#id_inmueble').val();


                $.ajax({
                    type: 'POST',
                    url: "registro-interesados",
                    data: {
                        nombre_interesado: nombre_interesado,
                        telefono_interesado: telefono_interesado,
                        mensaje_interesado: mensaje_interesado,
                        correo_interesado: correo_interesado,
                        id_inmueble: id_inmueble
                    },
                    success: function (data) {
                        $('#nombre_interesado').val('');
                        $('#telefono_interesado').val('');
                        $('#mensaje_interesado').val('');
                        $('#correo_interesado').val('');

                        Swal.fire('Mensaje Enviado!', '', 'success')
                    }
                });

			}
        });        

	}

});
