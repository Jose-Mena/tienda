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

    }
?>