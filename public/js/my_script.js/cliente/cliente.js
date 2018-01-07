$('#cliente_pagar').click(function() {
    documento = $('#documento').val()
    $.ajax({
        url: '/cliente/'+documento+'/consultar',
        type: 'GET',
        dataType: 'JSON'

    })
    .done(function(result) {
        console.log(result.result);
        if (result.result.length == 0) {
            alertas('Alerta','No encontro ningun registro con el documento: '+documento,'warning')
            return false;
        }else {
            $('#cliente_id').val(result.result.documento)
            $( "#frm_cliente" ).submit();
        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

});
