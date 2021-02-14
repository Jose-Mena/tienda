<?php
	class Singup extends Controlador{

		public function __construct(){
            session_start();
        }

        public function registro(){
            $this->m = $this->modelo('Cliente');

            if(!$this->m->inicio($_POST['id'])){
                $table = $this->m->registro($_POST['nombre'], $_POST['apellido'], $_POST['id'], $_POST['correo'], $_POST['celular']); 
        
                if($table){
                    $json = json_encode(array('success'=>true));
                }else{
                    $json = json_encode(array('success'=>false, 'mensaje'=>'Error no se ha podido realizar el registro'));
                }
            }else{
                $json = json_encode(array('success'=>false, 'mensaje'=>'Identificacion ya registrada'));
            }

            

            echo $json;
        }

        public function login(){
            $this->m = $this->modelo('Cliente');
            $res = $this->m->inicio($_POST['identificacion']);
            if($res){
                if( $_POST['correo']==$res->correo){
                    $_SESSION['usuario']=$res;
                    $_SESSION['carrito']=[];
                    $json = json_encode(array('success'=>true));
                }else{
                    $json = json_encode(array('success'=>false, 'mensaje'=>'El correo no corresponde a la identificación'));
                }
            }else{
                $json = json_encode(array('success'=>false, 'mensaje'=>'La identificacion no está registrada'));
            }

            echo $json;
        }

    }
?>