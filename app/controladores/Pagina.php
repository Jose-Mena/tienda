<?php
	class Pagina extends Controlador{

		public function __construct(){
            session_start();
        }

        public function index(){
            $datos['productos'] = $this->modelo('Inventario')->productos();
            if(isset($_SESSION['cliente'])){
               $datos['cliente']=$_SESSION['cliente']->nombre.' '.$_SESSION['cliente']->apellido;
            }
			$this->vista('home', $datos);	
        }

        public function login(){
            if(!isset($_SESSION['cliente'])){
                $datos['login'] = true;
                $this->vista('login', $datos);
            }else{
                header('Location: '.RUTA_URL);
            }	
        }

        public function admin(){
            if(!isset($_SESSION['admin'])){
                $datos['login'] = true;
                $this->vista('admin', $datos);
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

        public function pedidos($id=false){
            if(!isset($_SESSION['cliente'])){
                header('Location: '.RUTA_URL.'/login');
            }else{
                if(isset($_SESSION['cliente'])){
                    $datos['cliente']=$_SESSION['cliente']->nombre.' '.$_SESSION['cliente']->apellido;
                 }
                $this->vista('pedidos', $datos);
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
            setcookie('carrito', serialize([]), time() + (60 * 60));
            unset($_COOKIE["carrito"]);
            header('Location: '.RUTA_URL.'/login');
        }

    }
?>