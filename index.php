<html>
<?php include 'header.php';?>
<body><div id="panelCentral">
<?php 
$categoria = isset($_GET['categoria']) ? $_GET['categoria']:'';
if(isset($_GET['idPonencia'])){
	include 'ponencias/ponencias.php';
}
switch ($categoria) {
	case 'index':
		include 'index/indexContent.php';
		break;
	case 'horario':
		include 'horario/horario.php';
		break;
	case 'inscripcion':
		include 'contacta/inscripcion.php';
		break;		
	case 'actividades':
		isset($_GET['id']) ? $_GET['id']:'index';
		include 'actividades/actividades.php';
		break;
	case 'ponencias':
	case 'inso':
	case 'so':
	case 'ig':
	case 'sc':
	case 'bd':
	case 'iu':
	case 'co':
		include 'ponencias/ponencias.php';
		break;
	case 'ciudad':
		include 'ciudad/sobreLaCiudad.php';
		break;
	case 'colabora':
		include 'colabora/colabora.php';
		break;
	case 'llegar':
		include 'ciudad/comoLlegar.php';
		break;
	case 'contacta':
		include 'contacta/contacto.php';	
		break;
	default:
		break;
}
?></div><div id="panelLateral">
<?php
include 'sidebar.php';?>

</div>
</body>
<?php include 'footer.php';?>
</html>