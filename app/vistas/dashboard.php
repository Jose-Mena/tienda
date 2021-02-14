<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/admin.css">
</head>
<body>


    <div class="account">
        <div class="items">
            <ul>
                <li class="titulo-item">Inventario</li>
                <li class="list-item">Nuevo Producto</a></li>
                <li class="list-item">Productos</li>
                <li class="list-item">Productos Terminados</li>
                <li class="titulo-item">Preferencias</li>
                <li class="list-item"><a class="cta" href="<?php echo RUTA_URL?>/logout">Cerrar Sesion</a></li>
            </ul>
        </div>
        <div class="cuerpo">

        </div>
    </div>


<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script>
    $(".list-item").click(function(){
        $('.list-item').removeClass('selected');
        $(this).addClass('selected')
    });
</script>

</body>
</html>