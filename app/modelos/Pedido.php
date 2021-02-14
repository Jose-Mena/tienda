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

		public function pedidos($c){
			$this->db->query("SELECT fecha, id, subtotal, impuesto, total FROM pedidos
								WHERE cliente=:c ORDER BY id DESC");
				
				$this->db->bind(':c',$c);

			$R = $this->db->registros();
			if($R==[]){
				return false;
			}else{
				return $R;
			}
		}

		public function detallepedido($id){
			$this->db->query("SELECT i.nombre AS nombre, v.valor AS precio, v.cantidad 
							FROM pedidos p 
							INNER JOIN ventas v ON p.id=v.pedido 
							INNER JOIN inventario i ON i.id=v.producto
							WHERE p.id=:id");
			$this->db->bind(':id',$id);
			return $this->db->registros();
		}
	}
?>