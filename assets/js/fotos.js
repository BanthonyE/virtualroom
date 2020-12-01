$(document).ready(function() {

    $('#cboinmueble').on('change', function() {

        $(".divregistrarfotos").show();

        let inmueble = $('#cboinmueble').val();

        $("#id_inmueble").val(inmueble);

        $.ajax({
            type: 'POST',
            url: "CargarInmueble",
            data: {
                inmueble: inmueble
            },
            success: function(data) {
                $('#vista_dep').html(data);
            }
        });
    })

})