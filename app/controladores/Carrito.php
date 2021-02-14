<?php
	class Carrito extends Controlador{

		public function __construct(){
            session_start();
        }

        public function agregar(){
            if(isset($_COOKIE['carrito'])) {
                $aCarrito = unserialize($_COOKIE['carrito']);
            }

            if(isset($_POST['id'])){
                $producto = $this->modelo('Inventario')->producto($_POST['id']);
                if(!isset($aCarrito[$_POST['id']])){
                    $aCarrito[$_POST['id']]['nombre'] = $producto->nombre;
                    $aCarrito[$_POST['id']]['precio'] = $producto->precio;
                    $aCarrito[$_POST['id']]['cantidad'] = 1;
                    $json = json_encode(array('success'=>true, 'mensaje'=>'Produto agregado al carrito.'));
                }else{
                    if($producto->cantidad==$aCarrito[$_POST['id']]['cantidad']){
                        $json = json_encode(array('success'=>false, 'mensaje'=>'Ya no hay mas productos disponibles'));
                    }else{
                        $aCarrito[$_POST['id']]['cantidad']+=1;
                        $json = json_encode(array('success'=>true, 'mensaje'=>'Se ha añadido otro '.$aCarrito[$_POST['id']]['nombre']));
                    }
                }  
            }

            $iTemCad = time() + (60 * 60);
            setcookie('carrito', serialize($aCarrito), $iTemCad);
            
            echo $json;
        }

        public function productosCarro(){
            $datosTabla = array(
                'data' => array()
            );

            if(isset($_COOKIE['carrito'])) {
                $aCarrito = unserialize($_COOKIE['carrito']);
            }else{
                $aCarrito = [];
            }

            $total = 0;
            foreach($aCarrito as $l => $k){
                $retirar = '<button class="cta" onclick="retirar('.$l.')">Retirar</button>';
                array_push($datosTabla['data'], array($k['nombre'], $k['precio'], $k['cantidad'], ($k['cantidad']*$k['precio']), $retirar));
                $total+=($k['cantidad']*$k['precio']);
            }

            $subtotal = ($total-($total*0.16));
            $impuesto = $total*0.16;

            $iTemCad = time() + (60 * 60);
            setcookie('subtotal', serialize($subtotal), $iTemCad);
            setcookie('impuesto', serialize($impuesto), $iTemCad);
            setcookie('total', serialize($total), $iTemCad);

            array_push($datosTabla['data'], array('....', '....', '....', '....', '....'));
            array_push($datosTabla['data'], array('Sub Total', '', '', '', '$'.number_format($subtotal,2)));
            array_push($datosTabla['data'], array('Impuesto', '', '', '', '$'.number_format($impuesto,2)));
            array_push($datosTabla['data'], array('Total', '', '', '', '$'.number_format($total,2)));

            $json = json_encode($datosTabla);

            echo $json;
        }

        public function desagregar(){
            if(isset($_COOKIE['carrito'])) {
                $aCarrito = unserialize($_COOKIE['carrito']);
            }

            if(isset($_POST['id'])){
                 
                if($aCarrito[$_POST['id']]['cantidad']<=1){
                    unset($aCarrito[$_POST['id']]);
                    $json = json_encode(array('success'=>false, 'mensaje'=>'Producto desagregado.'));
                }else{
                    $aCarrito[$_POST['id']]['cantidad']-=1;
                    $json = json_encode(array('success'=>true, 'mensaje'=>'Se ha desagregado un '.$aCarrito[$_POST['id']]['nombre']));
                }
                
            }

            $iTemCad = time() + (60 * 60);
            setcookie('carrito', serialize($aCarrito), $iTemCad);
            
            echo $json;
        }

        public function pedido(){
            if(isset($_COOKIE['carrito'])) {
                $aCarrito = unserialize($_COOKIE['carrito']);
            }else{
                $aCarrito = [];
            }

            if(count($aCarrito)<1){
                $json = json_encode(array('success'=>false, 'mensaje'=>'No hay productos en el carrito.'));
            }else{
            $this->pedido = $this->modelo('Pedido');
                $subtotal = unserialize($_COOKIE['subtotal']);
                $impuesto  = unserialize($_COOKIE['impuesto']);
                $total = unserialize($_COOKIE['total']);
                $fecha = $this->datetimeNow();

                $pedido = $this->pedido->nuevoPedido($_SESSION['cliente']->identificacion, $fecha, $subtotal, $impuesto, $total);
            
                if($pedido){
                    $this->producto = $this->modelo('Inventario');
                    foreach($aCarrito as $k => $v){
                        $this->pedido->nuevoProducto($k, $v['cantidad'], $pedido, $v['precio']);

                        $cantidad = $this->producto->producto($k);
                        $nuevaantidad = ($cantidad->cantidad - $v['cantidad']);

                        $this->producto->actualizarCantidad($k,$nuevaantidad);
                    }

                    setcookie('carrito', serialize([]), time() + (60 * 60));
                    $json = json_encode(array('success'=>true, 'mensaje'=>'Pedido Realizado.'));
                }else{
                    $json = json_encode(array('success'=>false, 'mensaje'=>'No hemos podido realizar el pedido.'));
                }
            
            }

            echo $json;
        }

        public function pedidos(){
            $datosTabla = array(
                'data' => array()
            );

            $pedidos = $this->modelo('Pedido')->pedidos($_SESSION['cliente']->identificacion);
            if($pedidos){
                foreach($pedidos as $l => $k){
                    $detalle = '<button class="cta" onclick="detalle('.$k->id.')">Detalles</button>';
                    array_push($datosTabla['data'], array($k->id, $k->fecha, $k->subtotal, $k->impuesto, $k->total, $detalle));
                }
            }

            $json = json_encode($datosTabla);

            echo $json;
        }

        public function detallepedido($id=false){
            $datosTabla = array(
                'data' => array()
            );
            if($id){
                $detalles = $this->modelo('Pedido')->detallepedido($id);

                $total = 0;
                foreach($detalles as $l => $k){
                    array_push($datosTabla['data'], array($k->nombre, $k->precio, $k->cantidad, ($k->cantidad*$k->precio)));
                    $total+=($k->cantidad*$k->precio);
                }

                $subtotal = ($total-($total*0.16));
                $impuesto = $total*0.16;

                $iTemCad = time() + (60 * 60);
                setcookie('subtotal', serialize($subtotal), $iTemCad);
                setcookie('impuesto', serialize($impuesto), $iTemCad);
                setcookie('total', serialize($total), $iTemCad);

                array_push($datosTabla['data'], array('....', '....', '....', '....'));
                array_push($datosTabla['data'], array('Sub Total', '', '', '$'.number_format($subtotal,2)));
                array_push($datosTabla['data'], array('Impuesto', '', '', '$'.number_format($impuesto,2)));
                array_push($datosTabla['data'], array('Total', '', '', '$'.number_format($total,2)));
            }
            $json = json_encode($datosTabla);

            echo $json;
        }

    }
?>