<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/admin.css">
</head>
<body>

    <div class="account">
        <div class="items">
            <ul>
                <li class="titulo-item">Inventario</li>
                <li href="#nuevo" class="list-item">Nuevo Producto</a></li>
                <li href="#productos" class="list-item">Productos</li>
                <li href="#terminados" class="list-item">Productos Terminados</li>
                <li class="titulo-item">Preferencias</li>
                <li class="list-item c"><a class="cta" href="<?php echo RUTA_URL?>/logout">Cerrar Sesion</a></li>
            </ul>
        </div>
        <div class="cuerpo">
            <div id="nuevo" class="cuerpo-item container">
                    <h1>Nuevo Producto</h1> 
                    <form id="frmRegistro"> 
                        <p id="alerta"></p>
                        <input type="text" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                        <input type="number" name="precio" id="precio" placeholder="Ingrese precio">
                        <input type="number" name="cantidad" id="cantidad" placeholder="Ingrese cantidad"> 
                        <label>Imagen</label>
                        <input type="file" id="imagen" name="imagen" accept="image/png, .jpeg, .jpg, image/png, .png"> 
                        <button id="btnNuevo" type="button" class="btn">Guardar Producto</button>
                    </form>

                </div>
            <div id="productos" class="cuerpo-item container">
                productos
            </div>
            <div id="terminados" class="cuerpo-item container">
                termjnados
            </div>

        </div>
    </div>

<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo RUTA_URL?>/js/dashboard.js"></script>

</body>
</html>