<?php
	class Producto extends Controlador{

		public function __construct(){
            session_start();
        }

        public function registro(){
            $res = $this->subirImagen(date("YmdHis"), 'productos');
    
            if($res['estado']){  
                $this->m = $this->modelo('Inventario');
                $table = $this->m->registro($_POST['nombre'], $_POST['precio'], $_POST['cantidad'], $res['respuesta']); 
                
                if($table){
                    $json = json_encode(array('success'=>true));
                }else{
                    $json = json_encode(array('success'=>false, 'mensaje'=>'Error no se ha registrar el producto'));
                }
 
            }else{
                $json = json_encode(array('success'=>$res['estado'], 'mensaje'=>$res['respuesta']));
            }

            echo $json;
        }

        public function allproductos(){
            $datosTabla = array(
                'data' => array()
            );

            $productos = $this->modelo('Inventario')->allproductos();
            if($productos){
                foreach($productos as $l => $k){
                    array_push($datosTabla['data'], array($k->nombre, $k->precio, $k->cantidad));
                }
            }

            $json = json_encode($datosTabla);

            echo $json;
        }

    }
?>