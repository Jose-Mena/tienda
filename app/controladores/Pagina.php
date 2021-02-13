<?php
	class Pagina extends Controlador{

		public function __construct(){
            session_start();
        }

        public function index(){
			$this->vista('home', NULL);	
        }

        public function login(){
			$this->vista('login', NULL);	
        }

        public function home(){
            if(!isset($_SESSION['sessionvotante']) || !$_SESSION['sessionvotante']){
                if(!isset($_SESSION['sessionvotante'])){
                    $_SESSION['sessionvotante']=false;
                }
                header('Location: '.RUTA_URL);
            }else{
                $this->vista('votaciones/home', NULL);
            }
				
        }

        public function logout(){
            session_unset();
            session_destroy();

            header('Location: '.RUTA_URL.'');
        }
    }
?>