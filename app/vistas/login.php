<?php include_once(RUTA_APP.'/vistas/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/login.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/navbar.php')?>

    <div id="login" class="login-page"> 
        <h1>Login</h1> 
        <form> 
            <input type="email" name="" id="" placeholder="Ingrese Correo">
            <input type="number" name="" id="" placeholder="Ingrese número de identificación"> 
            <button type="button" class="btn">Ingresar</button> 
        </form> 

        <p>¿No tienes cuenta? 
            <span id="registrate">¡Registrate!</span>
        </p>
     </div>

    <div id="registro" class="login-page" style="display: none"> 
        <h1>Registarte</h1> 
        <form> 
            <input type="text" name="" id="" placeholder="Ingrese su nombre">
            <input type="text" name="" id="" placeholder="Ingrese su apellido">
            <input type="email" name="" id="" placeholder="Ingrese su correo"
            <input type="number" name="" id="" placeholder="Ingrese su número de identificación">
            <input type="number" name="" id="" placeholder="Ingrese su número de celular"> 
            <button type="button" class="btn">Registrase</button> 
        </form>

        <p>¿Tienes cuenta? 
            <span id="inicio">¡Ingresa!</span>
        </p>
     </div>
     
<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script> 
$('#registrate').click(function(){
    $('#login').hide();
    $('#registro').show();
}); 

$('#inicio').click(function(){
    $('#registro').hide();
    $('#login').show();
}); 
</script> 
</body>
</html>