$('#cliente_pagar').on('click',function() {
    alert();
    documento = $('#documento').val()
    $.ajax({
        url: '/cliente/'+documento+'/consultar',
        type: 'GET',
        dataType: 'JSON',

    })
    .done(function(result) {
        console.log(result);
        if (result.result==0) {
            alertas('Alerta','No se econtraron datos para el documento: '+documento,'warning')
        }
    })
    .fail(function() {
        console.log("error");
    })
    .always(function() {
        console.log("complete");
    });

});
