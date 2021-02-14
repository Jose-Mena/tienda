$('#btnLogin').click(function(){
    let correo = $("#correo").val();
    let pwd = $("#pwd").val();
    
    if ($.trim(correo) == '') {
        $('#alertalogin').html('Por favor, ingrese correo.');
    } else if ($.trim(pwd) == '') {
        $('#alertalogin').html('Por favor, ingrese contraseña.');
    } else {
        $.ajax({
            url: "singup/loginAdmin",
            type: "POST",
            data: {
                'correo': correo,
                'pwd': pwd
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