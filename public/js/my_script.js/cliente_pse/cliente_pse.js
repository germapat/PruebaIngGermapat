$('#id_seguir').click(function(event) {
    
    $.ajax({
        url: '/cliente/pse/listar',
        type: 'POST',
        dataType: 'JSON',
        data: {'correo': $('#correo').val()
    },
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
    })
    .done(function(result) {
        console.log(result.result);
        if (result.result.length==0) {
            alertas('Alerta','No se encuentra registrado, por favor realice el registo para continuar','warning')
        }else {
            $( "#frm_cliente_pse" ).submit();
        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });


});
