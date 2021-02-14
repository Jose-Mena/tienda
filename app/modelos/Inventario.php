<?php 

	class Inventario{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function registro($nombre, $precio, $cantidad){

			$this->db->query("INSERT INTO inventario (nombre, precio, cantidad) 
							VALUES (:nombre, :precio, :cantidad)");

			$this->db->bind(':nombre', $nombre);
			$this->db->bind(':precio', $precio);
			$this->db->bind(':cantidad', $cantidad);

			if ($this->db->execute()) {
				return true;
			}else{
				return false;
			}
		}

		public function productos(){
			$this->db->query("SELECT id, nombre, precio, cantidad FROM inventario
							WHERE cantidad>0");
			$R = $this->db->registros();
			if($R==[]){
				return false;
			}else{
				return $R;
			}
		}

		public function Read($Id){
			$this->db->query("SELECT id FROM inventario WHERE id=:id");
			$this->db->bind(':id',$Id);
			return $this->db->registro();
		}



		public function Delete($Id){
			$d=$this->Read($Id);

			$this->db->query("DELETE FROM docentes WHERE id=:id");
			$this->db->bind(':id', $Id);

			$this->db->execute();
			$this->actualizarDocente();

			if (!$this->Read($Id)) {
				return $d->imagen;
			}
			else{
				return true;
			}
		}

		public function actualizarDocente(){
			$D = $this->ReadAll();
			if(!$D){
				$D=[];
			}

			$variableJ=json_encode($D);

			$archivoJ=fopen(RUTA_APP.'/data/docentes.json', 'w');
				fwrite($archivoJ, $variableJ);
			fclose($archivoJ);
		}*/
	}
?>