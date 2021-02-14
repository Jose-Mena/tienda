$('#tablaCarrito').dataTable({
    ajax: "Carrito/productosCarro",
    "searching": false,
    "bPaginate": false,
    "pagingType": "simple",
    "bInfo" : false,
    "order": [],"language": {
        "emptyTable": "Carrito Vacio"
      }
});

$('.producto-item').hover(
    function() {
        $(this).find('.producto-desc').addClass( "hover" );
    }, function() {
        $(this).find('.producto-desc').removeClass( "hover" );
    }
); 

$('.carro').click(function() {   
    $.ajax({
        url: 'Carrito/agregar',
        method: 'POST',
        data: { 'id': $(this).attr('id')},
        dataType: 'JSON',
        success: function(res) {
            if (res.success == true) {
                $('#alerta').html(res.mensaje);
                $('.carrito').addClass('vercarrito');
            } else {
                $('#alerta').html(res.mensaje);
            }
        },
        error: function() {
            $('#alerta').html('Estamos sufirendo dificultades, por favor intente más tarde.');
        },
        complete: function(){
            $('.alert').addClass("view");
            setTimeout(function(){
                $('.alert').removeClass("view");
            }, 2000)

            $('#tablaCarrito').DataTable().ajax.reload();
        }
    });
}); 

$('#vercarro').click(function(){
    $('.carrito').toggleClass('vercarrito');
});

$('#pedido').click(function(){
    $.ajax({
        url: 'Carrito/pedido',
        method: 'POST',
        dataType: 'JSON',
        success: function(res) {
            if (res.success == true) {
                $('#alerta').html(res.mensaje);
            } else {
                $('#alerta').html(res.mensaje);
                $('.carrito').removeClass('vercarrito');
            }
        },
        error: function() {
            $('#alerta').html('Estamos sufirendo dificultades, por favor intente más tarde.');
        },
        complete: function(){
            $('.alert').addClass("view");
            setTimeout(function(){
                $('.alert').removeClass("view");
            }, 2000)

            $('#tablaCarrito').DataTable().ajax.reload();
        }
    });
});

function retirar(id){
    $.ajax({
        url: 'Carrito/desagregar',
        method: 'POST',
        data: { 'id': id },
        dataType: 'JSON',
        success: function(res) {
            if (res.success == true) {
                $('#alerta').html(res.mensaje);
            } else {
                $('#alerta').html(res.mensaje);
            }
        },
        error: function() {
            $('#alerta').html('Estamos sufirendo dificultades, por favor intente más tarde.');
        },
        complete: function(){
            $('.alert').addClass("view");
            setTimeout(function(){
                $('.alert').removeClass("view");
            }, 2000)

            $('#tablaCarrito').DataTable().ajax.reload();
        }
    });
}