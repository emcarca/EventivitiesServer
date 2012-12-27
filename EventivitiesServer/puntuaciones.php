<?php
include_once('globales.php');
include_once('bdadministrador.php');

class eventos{

	public function getPuntuaciones(){
		$sql = "SELECT * ";
		$sql .= " FROM Puntuacion ";
		$db = new bdadministrador();
		return $db->executeQuery($sql);
	}
	
	public function getPuntuacionesEvento($idEvento){
		$sql = "SELECT * ";
		$sql .= " FROM Puntuacion WHERE idEvento=".$idEvento;
		$db = new bdadministrador();
		return $db->executeQuery($sql);
	}
	
	public function getJSONPuntuaciones(){
		$json = "";
		$i = 0;
		$result = $this->getPuntuaciones();
			
		$json .= " { \"exito\" : \"1\" , \"puntuaciones\" : [ ";
		if($result!=null)
		{
			while($obj = $result->fetch_object()){
				if($i > 0)
					$json .= ",";
				//"yyyy-MM-dd HH:mm"
				$json .= " { \"idPuntuacion\" : ".$obj->idPuntuacion.", \"puntuacion\": \"".$obj->Puntuacion."\", \"idEvento\": \""
						.$obj->idEvento."\", \"idUsuario\": \"".$obj->idUsuario."\" ";
	
	
				$json .= "} ";
				$i++;
			}
	
			$json .= " ] ";
			$json .= " } ";
			return $json;
	
		}
	}

	public function getJSONEventosLocal($idLocal){
		$json = "";
		$i = 0;
		$result = $this->getEventosLocal($idLocal);
		
		//$json .= " { \"eventos\" : [ ";
		$json .= " { \"exito\" : \"1\" , \"eventos\" : [ ";
		if($result!=null)
		{
			while($obj = $result->fetch_object()){
				if($i > 0)
					$json .= ",";
					//"yyyy-MM-dd HH:mm"
 				$json .= " { \"idEvento\" : ".$obj->idEvento.", \"nombre\": \"".$obj->Nombre."\", \"descripcion\": \""
 						.$obj->Descripcion."\", \"fechaInicio\": \"".$obj->FechaInicio. "\", \"fechaFin\": \"".$obj->FechaFin."\",
								 \"idLocal\": \"".$obj->idLocal."\" ";
				

 				$json .= "} "; 						
				$i++;
			}
	
			$json .= " ] ";
			$json .= " } ";
			return $json;

		}
	}
	
	
	
	public function getJSONError($tag, $errormsg){
		$response = array("tag" => $tag, "exito" => 0, "error" => 1, "error_msg" => $errormsg);
		return json_encode($response);
	}
}
?>