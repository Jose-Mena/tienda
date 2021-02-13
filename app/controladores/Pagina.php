<?php
	class Pagina extends Controlador{

		public function __construct(){
            session_start();
        }

        public function index(){
            if(isset($_SESSION['usuario'])){
               $datos=array(
                   'nombre'=>$_SESSION['usuario']->nombre.' '.$_SESSION['usuario']->apellido
               );
            }else{
                $datos=false;
            }
			$this->vista('home', $datos);	
        }

        public function login(){
            if(!isset($_SESSION['usuario'])){
                $this->vista('login', NULL);
            }else{
                header('Location: '.RUTA_URL);
            }	
        }

        public function logout(){
            session_unset();
            session_destroy();

            header('Location: '.RUTA_URL);
        }
    }
?>