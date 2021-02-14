<?php
	class Pagina extends Controlador{

		public function __construct(){
            session_start();
        }

        public function index(){
            if(isset($_SESSION['cliente'])){
               $datos['cliente']=$_SESSION['cliente']->nombre.' '.$_SESSION['cliente']->apellido;
            }else{
                $datos=false;
            }
			$this->vista('home', $datos);	
        }

        public function login(){
            if(!isset($_SESSION['cliente'])){
                $this->vista('login', NULL);
            }else{
                header('Location: '.RUTA_URL);
            }	
        }

        public function admin(){
            if(!isset($_SESSION['admin'])){
                $this->vista('admin', NULL);
            }else{
                header('Location: '.RUTA_URL.'/dashboard');
            }
        }

        public function dashboard(){
            if(isset($_SESSION['admin'])){
                $this->vista('dashboard', NULL);
            }else{
                header('Location: '.RUTA_URL.'/admin');
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
            header('Location: '.RUTA_URL.'/login');
        }

    }
?>