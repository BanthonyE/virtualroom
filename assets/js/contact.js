$('#enviarEmail').click(function () {


	if ($.trim($('#txtnombre').val()).length == 0) {
		error_txtnombre = 'Ingrese el su nombre';
		$('#error_txtnombre').text(error_txtnombre);
		$('#txtnombre').addClass('has-error');
	} else {
		error_txtnombre = '';
		$('#error_txtnombre').text(error_txtnombre);
		$('#txtnombre').removeClass('has-error');
	}


	if ($.trim($('#txtmensaje').val()).length == 0) {
		error_txtmensaje = 'Ingrese su Mensaje';
		$('#error_txtmensaje').text(error_txtmensaje);
		$('#txtmensaje').addClass('has-error');
	} else {
		error_txtmensaje = '';
		$('#error_txtmensaje').text(error_txtmensaje);
		$('#txtmensaje').removeClass('has-error');
	}


	if ($.trim($('#txtcontacto').val()).length == 0) {
		error_txtcontacto = 'Ingrese su número de celular o teléfono';
		$('#error_txtcontacto').text(error_txtcontacto);
		$('#txtcontacto').addClass('has-error');
	} else {
		error_txtcontacto = '';
		$('#error_txtcontacto').text(error_txtcontacto);
		$('#txtcontacto').removeClass('has-error');
	}

	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if ($.trim($('#txtemail').val()).length == 0) {
		error_txtemail = 'Ingrese su E-mail';
		$('#error_txtemail').text(error_txtemail);
		$('#txtemail').addClass('has-error');
	} else {
		if (!filter.test($('#txtemail').val())) {
			error_txtemail = 'E-mail inválido';
			$('#error_txtemail').text(error_txtemail);
			$('#txtemail').addClass('has-error');
		} else {
			error_txtemail = '';
			$('#error_txtemail').text(error_txtemail);
			$('#txtemail').removeClass('has-error');
		}
    }
    
	if (error_txtnombre !== '' || error_txtmensaje !== ''  || error_txtcontacto !== '' || error_txtemail !== '') {
		Swal.fire({
			title: 'Ingrese los datos correctamente',
			text: "Verifique sus datos en los campos de texto",
			icon: 'warning',
			confirmButtonText: `OK`
		})
	} else {
		Swal.fire({
			title: '¿Estás seguro de enviar un mensaje?',
			text: "Tu mensaje será enviado en la bandeja de entrada del propietario",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
            if (result.isConfirmed) {

/*                 let txtnombre = $('#txtnombre').val();
                let txtmensaje = $('#txtmensaje').val();
                let txtcontacto = $('#txtcontacto').val();
                let txtemail = $('#txtemail').val();
 */
				document.form.action = "enviar_email";
				document.form.method = "POST";
				document.form.submit();
			}
        });
        

	}

});
