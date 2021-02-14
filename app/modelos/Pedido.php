<?php 

	class Pedido{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function nuevoPedido($cliente, $fecha, $subtotal, $impuesto, $total){

			$this->db->query("INSERT INTO pedidos (cliente, fecha, subtotal, impuesto, total) 
							VALUES (:cliente, :fecha, :subtotal, :impuesto, :total)");

			$this->db->bind(':cliente',$cliente);
			$this->db->bind(':fecha',$fecha);
			$this->db->bind(':subtotal',$subtotal);
			$this->db->bind(':impuesto',$impuesto);
			$this->db->bind(':total',$total);

			if ($this->db->execute()) {
				$this->db->query("SELECT MAX(id) AS id FROM pedidos");
				$id = $this->db->registro();
				return $id->id;
			}else{
				return false;
			}
		}

		public function nuevoProducto($producto, $cantidad, $pedido, $valor){

			$this->db->query("INSERT INTO ventas (producto, cantidad, pedido, valor) 
							VALUES (:producto, :cantidad, :pedido, :valor)");

			$this->db->bind(':producto', $producto);
			$this->db->bind(':cantidad', $cantidad);
			$this->db->bind(':pedido', $pedido);
			$this->db->bind(':valor', $valor);

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

		public function producto($Id){
			$this->db->query("SELECT nombre, precio, cantidad, imagen FROM inventario
						WHERE id=:id");
			$this->db->bind(':id',$Id);
			return $this->db->registro();
		}
	}
?>