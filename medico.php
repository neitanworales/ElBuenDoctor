<?php
require('clases/conexion.class.php'); 
$conectador = new DBManager();
$conectador->conectar();
$arreglo=$conectador->get_CargarMedico($_GET["cedula"]);
//print_r($arreglo);
?>
<html>
<head>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/styleCorazones.css" />
<title>Médico</title>
</head>
<body>
<center>
<table width="500" border="1">
  <tr>
    <td  colspan="2" height="200" align="center"><img src="medico_img.jpg"></td>
  </tr>
  <tr>
    <th width="50">Nombre</th>
    <td><?php echo $arreglo[0]['nombre'];?></td>
  </tr>
  <tr>
  	<th>C&eacute;dula</th>
    	<td><?php echo $arreglo[0]['cedula'];?></td>
  </tr>
  <tr>
  	<th>Profesi&oacute;n</th>
    <td><?php echo $arreglo[0]['profesion'];?></td>
  </tr>
  <tr>
    <th>Especialidad</th>
    <td><?php echo $arreglo[0]['especialidad1'];?></td>
  </tr>
  <tr>
  	<th>2da. especialidad</th>
    <td><?php echo $arreglo[0]['especialidad2'];?></td>
  </tr>
  <tr>
    <th>Unidad M&eacute;dica</th>
    <td><?php echo $arreglo[0]['unidadMedica'];?></td>
  </tr>
  <tr>
    <th>RANKING</th>
    <td><div class="ec-stars-wrapper">
							<a href="#" data-value="1" title="Votar con 1 estrellas">&#9829;</a>
							<a href="#" data-value="2" title="Votar con 2 estrellas">&#9829;</a>
							<a href="#" data-value="3" title="Votar con 3 estrellas">&#9829;</a>
							<a href="#" data-value="4" title="Votar con 4 estrellas">&#9829;</a>
							<a href="#" data-value="5" title="Votar con 5 estrellas">&#9829;</a>
							</div></td>
  </tr>
   <tr>
    <td colspan="2">Experiencias con el médico:</br>
	Luis Mendieta:</br></br>
	Me gusta mucho como atiende este médico, atendió de la forma correcta y como yo deseaba, sobre todo fue muy profesional y comprometido con su trabajo. 
	Hizo que confiara totalmente en que estaba en buenas manos.</br></br>
	
	Deja tu experiencia:
	<textarea name="Area" cols="70" rows="10"></textarea></br>
<center><button type="submit">Enviar</button></center>
	
	</td>
	</tr>
</table>

</center>
</body>
</html>
