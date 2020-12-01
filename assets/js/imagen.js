$('#cboinmueble').change(function(){
    $('.div1').hide();
    $('.div2').show();
    
    let anuncio = $('#cboinmueble').val();

    $.ajax({
        type: 'POST',
        url: "CargarAnuncio",
        data: {
            anuncio: anuncio
        },
        success: function(data) {
            $('#cboanuncio').html(data);
        }
    });

});

$('#cboanuncio').change(function(){
    
    let id_anuncio = $('#cboanuncio').val();
    let id_inmueble = $('#cboinmueble').val();
    
    $('#id_inmueble').val(id_inmueble);
    $('#id_anuncio').val(id_anuncio);

    if (id_anuncio!="No hay anuncios" || id_anuncio!="Seleccione una opción") {

        $.ajax({
            type: 'POST',
            url: "CargarVistaAnuncio",
            data: {
                id_anuncio: id_anuncio,
                id_inmueble: id_inmueble
            },
            success: function(data) {
                $('#vistainfo').hide();
                $('.vista').html(data);
            }
        });
    }

});


