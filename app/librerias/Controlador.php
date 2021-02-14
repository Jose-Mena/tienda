<?php
	class Controlador{
		public function modelo($modelo){
			require_once '../app/modelos/'.$modelo.'.php';
			return new $modelo();
		}

		public function vista($vista, $datos = []){
			if (file_exists('../app/vistas/'.$vista.'.php')) {
				require_once '../app/vistas/'.$vista.'.php';
			}else{
				die('La vista no existe');
			}
		}

		function subirImagen($tiempo, $ruta){
			if($_FILES['imagen']['tmp_name']!=""){
				$ext = pathinfo($_FILES["imagen"]['name']); 
				$ext = $ext['extension'];
				
				if($ext=="jpg" || $ext=="JPG" || $ext=="jpeg" || $ext=="JPEG" || $ext=="png" || $ext=="PNG"){
				  $url= RUTA_APP."/../public/img/".$ruta."/img_".$tiempo.".".$ext;

				  if (move_uploaded_file($_FILES['imagen']['tmp_name'], $url)) {
					return array('estado'=>true, 'respuesta'=>"img_".$tiempo.".".$ext);
				  }else{
					return array('estado'=>false, 'respuesta'=>'Error no se pudo subir la imagen');
				  }
				}else{
				  return array('estado'=>false, 'respuesta'=>'Archivo Invalido. No es posible subir este tipo de archivos.');
				}
			}else{
			  return array('estado'=>false, 'respuesta'=>'No se ha recibido el archivo');
			}
		}

		public function datetimeNow(){
			$fechaactual = getdate();
			$hora=$fechaactual['hours'];
			$minuto=$fechaactual['minutes'];
			$segundo=$fechaactual['seconds'];
			$anio=$fechaactual['year'];
			$mes=$fechaactual['mon'];
			$dia=$fechaactual['mday'];
			$actual =  ($anio<=9 ? '0' .$anio : $anio)."-".($mes<=9 ? '0' .$mes : $mes)."-".($dia<=9 ? '0' .$dia : $dia)." ".($hora<=9 ? '0' .$hora : $hora).":".($minuto<=9 ? '0' .$minuto : $minuto).":".($segundo<=9 ? '0' .$segundo : $segundo);
			return $actual;
		}

	}
?>