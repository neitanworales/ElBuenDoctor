<?php 
include_once("conexion.class.php");

class Cliente{
 //constructor	
 	var $con;
 	function Cliente(){
 		$this->con=new DBManager;
 	}

	
	function actualizar($campos,$id){
		if($this->con->conectar()==true){
			//print_r($campos);
			return mysql_query("UPDATE cliente SET nombres = '".$campos[0]."', ciudad = '".$campos[1]."', sexo = '".$campos[2]."', telefono = '".$campos[3]."', fecha_nacimiento = '".$campos[4]."' WHERE id = ".$id);
		}
	}
	

function get_arreglo($query)
{
	$arreglo = array();
	$i = 0;	
	if($this->con->conectar()==true){	
		$res = mysql_query($query) or die(mysql_error());	
		while ($fila =  mysql_fetch_assoc($res)) 
		{
			$keys = array_keys($fila);
			foreach($keys as $key)
				$arreglo[$i][$key]=$fila[$key];
			$i++;			
		}
	}		
	return $arreglo;
}
}
?>