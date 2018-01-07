$('#id_seguir').click(function(event) {

    $.ajax({
        url: '/cliente/pse/listar',
        type: 'POST',
        dataType: 'JSON',
        data: {'correo': $('#correo').val(),
        '_token': $("input[name=_token]").val()
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
