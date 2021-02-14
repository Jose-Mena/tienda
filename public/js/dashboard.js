$('#todosproductos').dataTable({
    ajax: "Producto/allproductos",
    "searching": false,
    "bPaginate": false,
    "pagingType": "simple",
    "bInfo" : false,
    "order": [],"language": {
        "emptyTable": "No hay productos"
      }
});

$(".list-item").click(function(){
    $('.list-item').removeClass('selected');
    $(this).addClass('selected');
    $('.cuerpo-item').hide();
    $(this).parents('.items').next('.cuerpo').find($(this).attr('href')).show();
});

$('#btnNuevo').click(function(){
    let nom = $('#nombre').val();
    let precio = $('#precio').val();
    let cantidad = $('#cantidad').val();

    if ($.trim(nom) == '') {
        $('#alerta').html("Por favor, ingrese el nombre del producto.");
    }else if($.trim(precio) == '') {
        $('#alerta').html("Por favor, ingrese el precio del producto.");
    }else if($.trim(cantidad) == '') {
        $('#alerta').html("Por favor, ingrese cantidad del producto.");
    }else if($.trim($('#imagen').val()) == '') {
        $('#alerta').html("Por favor, ingrese una imagen.");
    }else {
        let datos = new FormData($("#frmRegistro")[0]);
        $.ajax({
            url: 'Producto/registro',
            method: 'POST',
            data: datos,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function(res) {
                if (res.success == true) {
                    $('#alerta').html('Produto Registrado.');
                    $("#frmRegistro")[0].reset();
                    
                    $('.list-item').removeClass('selected');
                    
                    $('.cuerpo-item').hide();
                    $('#productos').show();

                } else {
                    $('#alerta').html(res.mensaje);
                }
            },
            error: function() {
                $('#alerta').html('Estamos sufirendo dificultades, por favor intente más tarde.');
            }
        });
    }
});

