<?php 

	class Docente{
		private $db;

		public function __construct(){
			$this->db = new Base;
		}

		public function ReadAll(){
			$this->db->query("SELECT * FROM inventario");
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
		
		public function Create($datos){

			$this->db->query("INSERT INTO docentes (nombre, apellido, imagen, correo) VALUES (:nombre, :apellido, :imagen, :correo)");

			$this->db->bind(':nombre', $datos['nombre']);
			$this->db->bind(':apellido', $datos['apellido']);
			$this->db->bind(':imagen', $datos['imagen']);
			$this->db->bind(':correo', $datos['correo']);

			if ($this->db->execute()) {
				$this->actualizarDocente();
				return true;
			}
			else{
				return false;
			}
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
		}
	}
?>