<?php include_once(RUTA_APP.'/vistas/header.php')?>
    <link rel="stylesheet" href="<?php echo RUTA_URL?>/css/home.css">
</head>
<body>
<?php include_once(RUTA_APP.'/vistas/navbar.php')?>

    <div class="container"> 
        <div class="productos">
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/1.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/2.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/3.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/1.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/2.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
            <div class="producto-item">
                <div class="producto-nom">
                    <p>nombre producto</p>
                </div>
                <div class="producto-img">
                    <img src="img/3.jpg">
                </div>
                <div class="producto-desc">
                    <p>Precio: $500.000</p>
                    <button class="cta">Añadir al carrito</button>
                    <button class="cta">Detalle</button>
                </div>
                
            </div>
        </div>
    </div>
<script src="<?php echo RUTA_URL?>/js/jquery-3.5.1.min.js"></script>
<script> 
$('.producto-item').hover(
    function() {
        $(this).find('.producto-desc').addClass( "hover" );
    }, function() {
        $(this).find('.producto-desc').removeClass( "hover" );
    }
); 

</script>
</body>
</html>