<?php 
	class Administrador{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function inicio($correo){
			$this->db->query("SELECT correo, pwd 
								FROM administradores 
								WHERE correo=:c");
			$this->db->bind(':c',$correo);
			return $this->db->registro();
		}
		
	}
?>