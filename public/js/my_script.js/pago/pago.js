$('#btn_pagar').click(function(event) {


    $.ajax({
        url: '/cliente/pagar',
        type: 'POST',
        dataType: 'JSON',
        data: {
            'documento': $('#documento').val(),
            'tipo_persona': $('#sel_type_person').val(),
            'sel_bank': $('#sel_bank').val()

        },
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
}).always(function(result) {
    console.log(result.length)
    console.log(result.result)
        if (result.estado==200) {
            window.location.assign(result.result)
        }else {
            for (var i = 0; i < result.result.length; i++) {
                $('#ul_error').append('<li>'+result.result+'</li>')
            }
            $('alerta_error_transaccion').show();
        }
    });



});
