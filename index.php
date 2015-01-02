<?php
require('clases/conexion.class.php'); 
$conectador = new DBManager();
$conectador->conectar();
$estado = 0;
$hosp=0;
$esp=0;
if(!empty($_POST['Estado']))
{
  $estado = $_POST['Estado'];
  $arrHospitales = $conectador->get_Hospitales($estado);
}

if(!empty($_POST['Hospital']))
{
	//echo $_POST['Hospital'];
	$hosp=$_POST['Hospital']; 
	$arrEsp = $conectador->get_Esp($hosp);
}

if(!empty($_POST["Especialidad"]))
{
	$esp=$_POST["Especialidad"];
  //$arrEsp = $conectador->get_Esp($_POST["Hosp"]);
}

$tableMed=$conectador->get_TableMed($conectador->get_Med($estado,$hosp,$esp));

?>

<html lang="es">
	<head>
		<title>GooDoc</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="Buscador de buenos medicos con la garantía de una cedula profesional vigente y valida ante la SEP y la " />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
            
		</noscript>
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/styleCorazones.css" />
	</head>
   

	<body>
		<!-- Header -->
			<header>
            	<img src="imagenes/Logo_sin_fondo_2.png" alt="Post thumbnail" class="thumbnail"
				<h1>  GooDoc</h1>				
			</header>
	<form name="frmGoodoc" action="index.php" method="POST">

        <select id="Estado" name="Estado" onChange="document.frmGoodoc.submit();">
  <option value="Estado">Estado</option>
  <option value="1" <?php echo $estado ==1?'selected="selected"':''?>>Aguascalientes</option>
  <option value="2" <?php echo $estado ==2?'selected="selected"':''?>>Baja California</option>
  <option value="3" <?php echo $estado ==3?'selected="selected"':''?>>Baja California Sur</option>
  <option value="4" <?php echo $estado ==4?'selected="selected"':''?>>Campeche</option>
  <option value="5" <?php echo $estado ==5?'selected="selected"':''?>>Chiapas</option>
  <option value="6" <?php echo $estado ==6?'selected="selected"':''?>>Chihuahua</option>
  <option value="7" <?php echo $estado ==7?'selected="selected"':''?>>Coahuila</option>
  <option value="8" <?php echo $estado ==8?'selected="selected"':''?>>Colima</option>
  <option value="9" <?php echo $estado ==9?'selected="selected"':''?>>Distrito Federal</option>
  <option value="10" <?php echo $estado ==10?'selected="selected"':''?>>Durango</option>
  <option value="11" <?php echo $estado ==11?'selected="selected"':''?>>Estado de México</option>
  <option value="12" <?php echo $estado ==12?'selected="selected"':''?>>Guanajuato</option>
  <option value="13" <?php echo $estado ==13?'selected="selected"':''?>>Guerrero</option>
  <option value="14" <?php echo $estado ==14?'selected="selected"':''?>>Hidalgo</option>
  <option value="15" <?php echo $estado ==15?'selected="selected"':''?>>Jalisco</option>
  <option value="16" <?php echo $estado ==16?'selected="selected"':''?>>Michoacán</option>
  <option value="17" <?php echo $estado ==17?'selected="selected"':''?>>Morelos</option>
  <option value="18" <?php echo $estado ==18?'selected="selected"':''?>>Nayarit</option>
  <option value="19" <?php echo $estado ==19?'selected="selected"':''?>>Nuevo León</option>
  <option value="20" <?php echo $estado ==20?'selected="selected"':''?>>Oaxaca</option>
  <option value="21" <?php echo $estado ==21?'selected="selected"':''?>>Puebla</option>
  <option value="22" <?php echo $estado ==22?'selected="selected"':''?>>Querétaro</option>
  <option value="23" <?php echo $estado ==23?'selected="selected"':''?>>Quintana Roo</option>
  <option value="24" <?php echo $estado ==24?'selected="selected"':''?>>San Luis Potosí</option>
  <option value="25" <?php echo $estado ==25?'selected="selected"':''?>>Sinaloa</option>
  <option value="26" <?php echo $estado ==26?'selected="selected"':''?>>Sonora</option>
  <option value="27" <?php echo $estado ==27?'selected="selected"':''?>>Tabasco</option>
  <option value="28" <?php echo $estado ==28?'selected="selected"':''?>>Tamaulipas</option>
  <option value="29" <?php echo $estado ==29?'selected="selected"':''?>>Tlaxcala</option>
  <option value="30" <?php echo $estado ==30?'selected="selected"':''?>>Veracruz</option>
  <option value="31" <?php echo $estado ==31?'selected="selected"':''?>>Yucatán</option>
  <option value="32" <?php echo $estado ==32?'selected="selected"':''?>>Zacatecas</option>
</select>

     <select id="Hospital" name="Hospital" onChange="document.frmGoodoc.submit();">
  <option value="0">Hospital</option>
  <?php 
    foreach($arrHospitales as $hospital)
    {
        echo '<option value="'.$hospital['id_hosp'].'" '.($hosp==$hospital['id_hosp']?'selected="selected"':'').'   >'.$hospital['unidadMedica'].'</option>';
    }
  ?>
	</select>

   <select id="Especialidad" name="Especialidad" onChange="document.frmGoodoc.submit();">
  <option value="0">Especialidad</option>   
  <?php 
    foreach($arrEsp as $esp)
    {
        echo '<option value="'.$esp['esp'].'"'.($_POST["Especialidad"]==$esp['esp']?'selected="selected"':'').'   >'.$esp['esp'].'</option>';
    }
  ?>
</select>

<button type="submit">Buscar</button>

    </form>
  <section>


<?php echo $tableMed;?>

  </section>

				
		
		<footer id="footer" class="container">
				<!-- Copyright -->
					<div id="copyright">
						
							<p>&copy; Koa	Todos los Derechos Reservados</p>
						
					</div>

			</footer>

	</body>
</html>