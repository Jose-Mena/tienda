$('#registrate').click(function(){
    $('#login').hide();
    $('#registro').show();
}); 

$('#inicio').click(function(){
    $('#registro').hide();
    $('#login').show();
});

$('#btnRegistro').click(function(){
    let nom = $('#nombre').val();
    let apel = $('#apellido').val();
    let correo = $('#correor').val();
    let id = $('#identificacionr').val();
    let celular = $('#celular').val();
    let emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    let regexname = /^[0-9]*$/;

    if ($.trim(nom) == '') {
        $('#alerta').html("Por favor, ingrese sus nombre.");
    } else if ($.trim(apel) == '') {
        $('#alerta').html("Por favor, ingrese sus apellidos.");
    } else if ($.trim(id) == '') {
        $('#alerta').html("Por favor, ingrese sus identificación.");
    } else if ($.trim(correo) == '') {
        $('#alerta').html("Por favor, ingrese su correo electrónico.");
    } else if (!emailRegex.test($.trim(correo))) {
        $('#alerta').html('Correo invalido.');
    } else if ($.trim(celular) == '') {
        $('#alerta').html("Por favor, ingrese su número de celular.");
    } else if (($.trim(celular.length)) < 10) {
        $('#alerta').html("Error, número de celular invalido, ha ingresado " + celular.length + ' digitos.');
    }else if (!regexname.test($.trim($('#celular').val()))) {
        $('#alerta').html('Por favor, ingrese solo números (Telefono).');
    }else {
        $.ajax({
            url: 'singup/registro',
            method: 'POST',
            data: {
                'nombre': nom,
                'apellido': apel,
                'id': id,
                'correo': correo,
                'celular': celular,
            },
            dataType: 'JSON',
            success: function(res) {
                if (res.success == true) {
                    $('#alerta').html('Usuario registrado correctamente.');
                    $("#frmRegistro")[0].reset();
                    setTimeout(function(){
                        $('#registro').hide();
                        $('#login').show();
                    },2000)
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

$('#btnLogin').click(function(){
    let correo = $("#correo").val();
    let identificacion = $("#identificacion").val();
    
    if ($.trim(correo) == '') {
        $('#alertalogin').html('Por favor, ingrese correo.');
    } else if ($.trim(identificacion) == '') {
        $('#alertalogin').html('Por favor, ingrese Identificacion.');
    } else {
        $.ajax({
            url: "singup/login",
            type: "POST",
            data: {
                'correo': correo,
                'identificacion': identificacion
            },
            dataType: "JSON",
            success: function(json) {
                if (json.success == true) {
                    $('#alertalogin').html("Logueado exitosamente!");
                    setTimeout(function(){
                        location.reload();
                    }, 2000)
                } else {
                    $('#alertalogin').html(json.mensaje);
                }
            },
            error: function() {
                $('#alertalogin').html('Estamos sufirendo dificultades, por favor intente más tarde.');
            }
        });
    }
});