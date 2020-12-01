$('#cboinmueble').change(function(){
    $('.div1').hide();
    $('.div2').show();
    
    let id_inmueble = $('#cboinmueble').val();

    $.ajax({
        type: 'POST',
        url: "CargarArrendatario",
        data: {
            id_inmueble: id_inmueble
        },
        success: function(data) {
            $('#cboarrendatario').html(data);
        }
    });

});

$('#cboarrendatario').change(function(){
    
    let id_arrendatario = $('#cboarrendatario').val();
    let id_inmueble = $('#cboinmueble').val();

    if (id_arrendatario!="No hay arrendatarios" || id_arrendatario!="Seleccione una opción") {
        
        $.ajax({
            type: 'POST',
            url: "CargarVistaDocumentos",
            data: {
                id_arrendatario: id_arrendatario,
                id_inmueble: id_inmueble
            },
            success: function(data) {
                $('#vistainfo').hide();
                $('.vista').html(data);
            }
        });
    }

});


