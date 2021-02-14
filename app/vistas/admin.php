<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/login.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/componentes/navbar.php')?>

    <div id="login" class="login-page"> 
        <h1>Login Admin</h1> 
        <form> 
            <p id="alertalogin"></p>
            <input type="email" id="correo" placeholder="Ingrese Correo">
            <input type="password" id="pwd" placeholder="Ingrese Contraseña"> 

            <button type="button" id="btnLogin" class="btn">Ingresar</button> 
        </form> 

     </div>
     
<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo RUTA_URL?>/js/admin.js"></script>
</body>
</html>