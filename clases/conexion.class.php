<?php 
class DBManager
{
	var $conect;
  
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	
	function DBManager(){
		$BaseDatos = "GOODOC";
		$Servidor = "localhost";
		$Usuario = "root";
		$Clave = "nuevo";	
	}

	 function conectar() 
	 {
		$BaseDatos = "GOODOC";
		$Servidor = "localhost";
		$Usuario = "root";
		$Clave = "nuevo";

		if(!($con=@mysql_connect($Servidor,$Usuario,$Clave))){
			echo"<h1> [:(] Error al conectar a la base de datos".$BaseDatos.$Servidor.$Usuario.$Clave."</h1>";	
			exit();
		}		if (!@mysql_select_db($BaseDatos,$con)){
			echo "<h1> [:(] Error al seleccionar la base de datos</h1>";  
			exit();
		}
		$conect=$con;
		return true;	
	}
	
	function get_Hospitales($estado)
	{
	$arreglo = array();
	$i = 0;	
		$que = "select id_hosp,unidadMedica from CAT_Hospitales where Estado=".($estado-1);
		$res = mysql_query($que) or die(mysql_error());	

		while ($fila =  mysql_fetch_assoc($res)) 
		{
			$keys = array_keys($fila);
			foreach($keys as $key)
				$arreglo[$i][$key]=$fila[$key];
			$i++;			
		}	
	return $arreglo;
	}

	function get_Esp($numHosp)
	{
	echo $numHosp;
	$arreglo = array();
	$i = 0;	
		$que = "select distinct Especialidad1 esp from CAT_MEDICOS WHERE id_hosp = ".$numHosp;
		$res = mysql_query($que) or die(mysql_error());	

		while ($fila =  mysql_fetch_assoc($res)) 
		{
			$keys = array_keys($fila);
			foreach($keys as $key)
				$arreglo[$i][$key]=$fila[$key];
			$i++;			
		}	
	return $arreglo;
	}

	function get_Med($estado, $hosp, $especialidad)
	{
		//echo $estado." - ".$hosp." - ".$especialidad;
		$que = "select id_med,	nombre	Nombre,cedula Cédula ,	 profesion Profesión,	especialidad1 Especialidad,	especialidad2 '2da Especialidad' ,	unidadMedica Hospital ,ranking Ranking
from CAT_MEDICOS m
inner join CAT_HOSPITALES h on m.id_hosp=h.id_hosp";
		$pusewhere=false;
		if($estado<>0)
		{
			if(!$pusewhere){
				$que.=" WHERE id_estado=".($estado-1);
				$pusewhere=true;
				}
		}
		
		if($hosp<>0)
		{			
			$que.=($pusewhere?" and ":" where ")." m.id_hosp=".$hosp;
			$pusewhere=true;
		}
		
		if($especialidad!='')
		{			
			$que.=($pusewhere?" and ":" where ")." Especialidad1='".$especialidad."'";
			$pusewhere=true;
		}		
	
		//echo $que;
		
		$arreglo = array();
		$i = 0;	
		
		$res = mysql_query($que) or die(mysql_error());	

		while ($fila =  mysql_fetch_assoc($res)) 
		{
			$keys = array_keys($fila);
			foreach($keys as $key)
				$arreglo[$i][$key]=$fila[$key];
			$i++;			
		}	
		return $arreglo;
	}
	
	function get_CargarMedico($cedula)
	{
		$que = "select nombre, cedula, ranking, 'Hidalgo', profesion, especialidad1, especialidad2, m.id_hosp, unidadMedica from CAT_MEDICOS m
inner join CAT_HOSPITALES h on m.id_hosp=h.id_hosp where cedula=".$cedula;
		
		$arreglo = array();
		$i = 0;	
		
		$res = mysql_query($que) or die(mysql_error());	

		while ($fila =  mysql_fetch_assoc($res)) 
		{
			$keys = array_keys($fila);
			foreach($keys as $key)
				$arreglo[$i][$key]=$fila[$key];
			$i++;			
		}	
		return $arreglo;
	}
	
	function get_TableMed($array)
	{
		$html = '<table>';	
		if(!empty ($array))
		{
		//table 
		$html = '<table class="tableRep" width="100%">';	
	$html.= '
	
			<col style="width:5%" aling="center"/>
			<col style="width:5%" aling="center"/>
			<col style="width:6%"/>
			<col style="width:15%" aling="center"/>
			<col style="width:7%"/>
			<col style="width:14%"/>								
			<col span="3"/>								
			<col />								
			<col />								
			<col />
			<col style="width:15%" aling="center"/>
			<col style="width:5%"/>
			<col style="width:3%"/>';
		
			//imprimir cabezeras
			$headers = array_keys($array[0]);
			$html.='<tr>';
			foreach($headers as $header)
			{
				if($header!='id_med')
				{
					$html.='<th class="thRep">'.$header.'</th>';
				}
			}	
			$html.="</tr>";
			
			//imprimir registros	
			foreach($array as $row)
			{
				$html.="<tr>";
				foreach($headers as $header)
				{
					if($header!='id_med')
					{
						$html.='<td>';	
						if($header=='Ranking')
						{
							$html.='<div class="ec-stars-wrapper">
							<a href="#" data-value="1" title="Votar con 1 estrellas">&#9829;</a>
							<a href="#" data-value="2" title="Votar con 2 estrellas">&#9829;</a>
							<a href="#" data-value="3" title="Votar con 3 estrellas">&#9829;</a>
							<a href="#" data-value="4" title="Votar con 4 estrellas">&#9829;</a>
							<a href="#" data-value="5" title="Votar con 5 estrellas">&#9829;</a>
							</div>';
						}
						else
							$html.='<a href="medico.php?cedula='.$row['Cédula'].'">'.$row[$header].'</a>';
						$html.='</td>';
					}
				}			
				$html.="</tr>";
			}			
			$html .= "</table>";
		}
		else
			$html = '<p>No se generó ningún resultado.</p>';
		return $html;
	}
}

?>
