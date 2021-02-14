<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/login.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/componentes/navbar.php')?>

    <div id="login" class="login-page"> 
        <h1>Login</h1> 
        <form> 
            <p id="alertalogin"></p>
            <input type="number" name="identificacion" id="identificacion" placeholder="Ingrese número de identificación"> 
            <input type="email" name="correo" id="correo" placeholder="Ingrese Correo">
            <button type="button" id="btnLogin" class="btn">Ingresar</button> 
        </form> 

        <p>¿No tienes cuenta? 
            <span id="registrate">¡Registrate!</span>
        </p>
     </div>

    <div id="registro" class="login-page" style="display: none"> 
        <h1>Registarte</h1> 
        <form id="frmRegistro"> 
            <p id="alerta"></p>
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
            <input type="text" name="apellido" id="apellido" placeholder="Ingrese su apellido">
            <input type="email" name="correor" id="correor" placeholder="Ingrese su correo">
            <input type="number" name="identificacionr" id="identificacionr" placeholder="Ingrese su número de identificación">
            <input type="number" name="celular" id="celular" placeholder="Ingrese su número de celular"> 
            <button id="btnRegistro" type="button" class="btn">Registrase</button>
        </form>
        <p>¿Tienes cuenta? 
            <span id="inicio">¡Ingresa!</span>
        </p>
     </div>
     
<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo RUTA_URL?>/js/login.js"></script>
</body>
</html>