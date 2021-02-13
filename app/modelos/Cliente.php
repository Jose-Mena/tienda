<?php 
	class Cliente{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function inicio($id){
			$this->db->query("SELECT correo, nombre, apellido, identificacion, celular 
								FROM clientes 
								WHERE identificacion=:id");
			$this->db->bind(':id',$id);
			return $this->db->registro();
		}

		public function registro($nombre, $apellido, $identificacion, $correo, $celular){
			$this->db->query("INSERT INTO clientes (nombre, apellido, identificacion, correo, celular)
								VALUES (:nombre, :apellido, :identificacion, :correo, :celular)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':apellido', $apellido);
			$this->db->bind(':identificacion', $identificacion);
			$this->db->bind(':correo', $correo);
			$this->db->bind(':celular', $celular);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}
		
	}
?>