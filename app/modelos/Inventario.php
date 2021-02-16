<?php 

	class Inventario{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function registro($nombre, $precio, $cantidad, $imagen){

			$this->db->query("INSERT INTO inventario (nombre, precio, cantidad, imagen) 
							VALUES (:nombre, :precio, :cantidad, :imagen)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':precio', $precio);
			$this->db->bind(':cantidad', $cantidad);
			$this->db->bind(':imagen', $imagen);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function productos(){
			$this->db->query("SELECT id, nombre, precio, cantidad, imagen FROM inventario
							WHERE cantidad>0");
			$R = $this->db->registros();
			if($R==[]){
				return false;
			}else{
				return $R;
			}
		}

		public function allproductos(){
			$this->db->query("SELECT id, nombre, precio, cantidad FROM inventario");
			$R = $this->db->registros();
			if($R==[]){
				return false;
			}else{
				return $R;
			}
		}

		public function producto($Id){
			$this->db->query("SELECT nombre, precio, cantidad, imagen FROM inventario
						WHERE id=:id");
			$this->db->bind(':id',$Id);
			return $this->db->registro();
		}

		public function actualizarCantidad($Id,$cantidad){
			$this->db->query("UPDATE inventario SET cantidad=:cantidad
						WHERE id=:id");
			$this->db->bind(':id',$Id);
			$this->db->bind(':cantidad',$cantidad);
			return $this->db->execute();
		}
	}
?>