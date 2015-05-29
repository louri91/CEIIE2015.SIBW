<html>
<?php include 'header.php';?>
<body><div id="panelCentral">
<?php
if(isset($_GET['categoria'])){
	$categoria = isset($_GET['categoria']) ? $_GET['categoria']:'';
} else{
	$categoria='index';
}
if(isset($_GET['p'])){
	$paso = $_GET['p'];
}
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
		if(isset($_GET['p'])){
			switch ($paso) {
				case 0:
					include 'contacta/inscripcion.php';
					break;
				case 1:
					include 'contacta/inscripcion_actividades.php';
					break;
				case 2:
					include 'contacta/inscripcion_hoteles.php';
					break;
			}
		}else{
			include 'contacta/inscripcion.php';
		}
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
	case 'login':
		include 'contacta/formularioLogin.html';
		break;
    case 'recordar':
	    include 'contacta/recordar.php';
	    break;
	case 'congresistas':
		if(isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true){
			if($_SESSION['nombre_perfil']=='admin'){
				include 'admin/scriptCongresistas.php';
			}
		}
		break;
	case 'inscripcionAdmin':
		if(isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true){
			if($_SESSION['nombre_perfil']=='admin'){
				if(isset($_GET['inscripcion'])){
						$inscripcion = $_GET['inscripcion'];
						include 'admin/scriptInscripcionUsuarios.php';

				}
			}
		}
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