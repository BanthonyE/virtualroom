$(document).ready(function() {

    var requisito = $.trim($('#cbodepartamento').val()).length;
    if(requisito !== 0){
        $(".provincia").show();
        $(".distrito").show();


        $.ajax({
            type: 'POST',
            url: "CargarProvincia",
            data: {
                depat: requisito
            },
            success: function(data) {

                
                $('#txtprovincia').html(data)

            }
        });
    
        var requisito2 = $.trim($('#id_distrito').val());
        var requisito3 = $.trim($('#nom_distrito').val());
        if(requisito2 !== 0){

 
            $('#cboDistrito').append(`<option value="${requisito2}"> 
            ${requisito3} 
       </option>`); 
            
        }
    
    }


    $('#cbodepartamento').on('change', function() {
        $(".provincia").show();
        let depat = $('#cbodepartamento').val();

        $.ajax({
            type: 'POST',
            url: "CargarProvincia",
            data: {
                depat: depat
            },
            success: function(data) {

                
                $('#txtprovincia').html(data)

            }
        });

    })

    $('#txtprovincia').on('change', function() {
        $(".distrito").show();
        let depat = $('#txtprovincia').val();

        $.ajax({
            type: 'POST',
            url: "CargarDistrito",
            data: {
                depat: depat
            },
            success: function(data) {
               
                $('#cboDistrito').html(data)
            }
        });

    })
})