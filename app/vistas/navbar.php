    <header>
        <div class="container">
            <a class="logo" href="<?php echo RUTA_URL ?>">CUC Store</a>
            <nav>
                <ul class="nav-links">
                    <li>
                        <a href="#">Celulares</a>
                    </li>
                    <li>
                        <a href="#">Computadores</a>
                    </li>
                    <li>
                        <a href="#">Accesorios</a>
                    </li>
                </ul>
            </nav>
<?php if($datos):?>
            <a><?php echo $datos['nombre'] ?></a>
            <a class="cta" href="<?php echo RUTA_URL ?>/logout">Salir</a>
<?php else:?>
            <a class="cta" href="<?php echo RUTA_URL ?>/login">Ingreso</a>
<?php endif; ?>
        </div>
    </header>