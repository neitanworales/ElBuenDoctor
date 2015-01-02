<?php
require('clases/conexion.class.php'); 
$conectador = new DBManager();
$conectador->conectar();

$arreglo=$conectador->get_CargarMedico($_GET["cedula"]);


if ($row = $arreglo){
echo ' <table border="1" align="center">\n';
echo '	<tr>';
echo '		<th height="300" width="300" colspan="2">IMAGEN';
echo '		</th>';
echo '	</tr>';
echo '	<tr>';
echo '		<td>';
echo '		Nombre</br>';
echo '		Cédula</br>';
echo '		Profesión</br>';
echo '		Especialidad</br>';
echo '		2da Especialidad</br>';
echo '		Unidad Médica</br>';
echo '		<td>';
echo '		</td>';
echo '		</td>';
echo '	</tr>';
echo '	<tr>';
echo '		<td>';
echo '		</td>';
echo '		<td>';
echo '		</td>';
echo '	</tr>';
echo '</table>';





echo '<tr> \n';
echo '<td colspan=\"6\"> <center> <b>DATOS</b></center></td> \n';


echo '</tr> \n';

echo "<tr> \n";
echo "<td><b>nombre</b></td> \n";

echo "<td><b>cedula</b></td> \n";

echo "<td><b>profesion</b></td> \n";

echo "<td><b>especialidad</b></td> \n";

echo "<td><b>especialidad 2</b></td> \n";

echo "<td><b>unidad Medica</b></td> \n";




echo "</tr> \n";


echo "<tr> \n";



echo "<td>".$row[0]['nombre']."</td>\n";
echo "<td>".$row[0]['cedula']."</td> \n";
echo "<td>".$row[0]['profesion']."</td> \n";
echo "<td>".$row[0]['especialidad1']."</td> \n";
echo "<td>".$row[0]['especialidad2']."</td> \n";
echo "<td>".$row[0]['unidadMedica']."</td> \n";



echo "</tr> \n";
}
?>
<html>
<head><title> Tabla de Multiplicar</title></head>
<body bgcolor="orange">
<center>
<table width="200" border="1">
  <tr>
    <td  colspan="2" height="200"></td>
  </tr>
  <tr>
    <td>Nombre:</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>C&eacute;dula</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
  	<td>Profesi&oacute;n;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Especialidad</td>
    <td></td>
  </tr>
  <tr>
  	<td>2da. especialidad</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Unidad M&eacute;dica</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>RANKING</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Opiones</td>
    <td>&nbsp;</td>
  </tr>
</table>


</center>
</body>
</html>