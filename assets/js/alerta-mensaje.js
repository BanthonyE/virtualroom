
    var mensaje = $.trim($('#mensaje').val());

	Swal.fire({
		title: mensaje,
		/* text: "Verifique sus datos en los campos de texto", */
		icon: 'warning',
		confirmButtonText: `OK`
	})