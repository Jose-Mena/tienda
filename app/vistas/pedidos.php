<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/home.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/componentes/navbar.php')?>

    <div class="container alert">
        <h1 id="alerta">A</h1>
    </div>

    <h2 class="blanco">Mis Pedidos</h2>
    <div class="container blanco"> 
        <table id="mispedidos">
            <thead class="titulo">
                <tr>
                    <th>Referencia</th>
                    <th>Fecha</th>
                    <th>SubTotal</th>
                    <th>Impuesto</th>
                    <th>Total</th>
                    <th>Detalle</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <table id="detalle" style="display: none">
        <thead class="titulo">
            <tr>
                <th>Producto</th>
                <th>Valor</th>
                <th>Cant.</th>
                <th>Total.</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    </div>

    <div class="carrito">
        <button class="cta vercarro">X</button>
        <h2>Carro de compras</h2>
    <table id="tablaCarrito">
        <thead class="titulo">
            <tr>
                <th>Producto</th>
                <th>Valor</th>
                <th>Cant.</th>
                <th>Total.</th>
                <th>+/-</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    
        <button id="pedido" class="cta red">Hacer Pedido</button>
    </div>
<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo RUTA_URL?>/js/jquery.dataTables.min.js"></script>
<script src="<?php echo RUTA_URL?>/js/home.js"></script>
<script src="<?php echo RUTA_URL?>/js/pedidos.js"></script>
</body>
</html>