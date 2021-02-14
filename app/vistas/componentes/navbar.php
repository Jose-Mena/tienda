    <header>
        <div class="container">
            <a class="logo" href="<?php echo RUTA_URL ?>">CUC Store</a>
<?php if(isset($datos['cliente'])):?>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a><?php echo $datos['cliente'] ?></a>
                    </li>
                </ul>
            </nav>
            <a id="vercarro" class="cta" href="#">Carrito</a>
            <a class="cta" href="<?php echo RUTA_URL ?>/logout">Salir</a>
<?php else:?>
            <a class="cta" href="<?php echo RUTA_URL ?>/login">Ingreso</a>
<?php endif; ?>
        </div>
    </header>