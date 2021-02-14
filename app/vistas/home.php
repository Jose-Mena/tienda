<?php include_once(RUTA_APP.'/vistas/componentes/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/home.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/componentes/navbar.php')?>

    <div class="container alert">
        <h1 id="alerta">A</h1>
    </div>

    <div class="container"> 
        <div class="productos">
            <?php foreach($datos['productos'] as $key): ?>
            <div class="producto-item">
                <div class="producto-nom">
                    <p><?php echo $key->nombre?></p>
                </div>
                <div class="producto-img">
                    <img src="img/productos/<?php echo $key->imagen?>">
                </div>
                <div class="producto-desc">
                    <p>Precio: $<?php echo $key->precio?></p>
                    <button id="<?php echo $key->id ?>" class="cta carro">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="carrito">
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
</body>
</html>