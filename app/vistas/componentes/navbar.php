    <header>
        <div class="container">
            <a class="logo" href="<?php echo RUTA_URL ?>">CUC Store</a>
<?php if(isset($datos['cliente'])):?>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a href="<?php echo RUTA_URL ?>/pedidos">Mis Pedidos</a>
                    </li>
                    <li>
                        <a class="vercarro" href="#">Carrito</a>
                    </li>
                </ul>
            </nav>
            
            <a>Hola, <?php echo $datos['cliente'] ?></a>
            <a class="cta" href="<?php echo RUTA_URL ?>/logout">Salir</a>
<?php else:?>
<?php if(!isset($datos['login'])): ?>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a class="vercarro" href="#">Carrito</a>
                    </li>
                </ul>
            </nav>
            <a class="cta" href="<?php echo RUTA_URL ?>/login">Ingreso</a>
<?php endif; ?>
<?php endif; ?>
        </div>
    </header>