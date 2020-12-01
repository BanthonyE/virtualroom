
$(document).on('change', '#tipo_documento', function(event) {
  var tipo_documento = $(this);
  var valor_tipo_documento = tipo_documento.val();

  if (valor_tipo_documento != 'Elegir tipo de documento') {
    $("#numero_documento").prop('disabled', false);
  }else{
    $("#numero_documento").prop('disabled', true);
  }
});


$('#numero_documento').keyup(function () {

  this.value = (this.value + '').replace(/[^0-9]/g, '');

	var nombre = $(this);
	var valor = (nombre.val());
	var cantidad_cifras = valor.length;

	var valor_tipo_documento = $.trim($('#tipo_documento').val());

	if (valor_tipo_documento == 'DNI') {
      $('#numero_documento').attr({maxLength: 8});

      if(cantidad_cifras==8){
        obtenerDato(valor);
      }
	} else if (valor_tipo_documento == 'Carnet de extranjería') {
    $('#numero_documento').attr({maxLength: 12});
	} else if (valor_tipo_documento == 'Pasaporte') {
    $('#numero_documento').attr({maxLength: 12});
	} else if (valor_tipo_documento == 'Partida de nacimiento') {
    $('#numero_documento').attr({maxLength: 15});
	}

});

function obtenerDato(valor) {
	let url = 'https://dni.optimizeperu.com/api/persons/' + valor + '?format=json';

	const api = new XMLHttpRequest();
	api.open('GET', url, true);
	api.send();

	api.onreadystatechange = function () {
		if (this.status == 200 && this.readyState == 4) {

			let datos = JSON.parse(this.responseText);
			console.log(datos);

			let nombre_completo = document.querySelector('#nombre_completo');
			let apellido_completo = document.querySelector('#apellido_completo');

			nombre_completo.innerHTML = '';
			apellido_completo.innerHTML = '';

			nombre_completo.value = datos.name;
			apellido_completo.value = datos.first_name + ' ' + datos.last_name;
		}
	}
}
