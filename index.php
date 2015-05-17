<html>
<?php include 'header.php';?>
<body><div id="panelCentral">
<?php 
$categoria = isset($_GET['categoria']) ? $_GET['categoria']:'index';
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
	case 'ponencias':
		include 'ponencias/is/insoftware.php';
		include 'ponencias/so/so.php';
		include 'ponencias/ig/ig.php';
		include 'ponencias/sc/sc.php';
		include 'ponencias/bd/bd.php';
		include 'ponencias/iu/iu.php';
		include 'ponencias/co/compiladores.php';
		break;
	case 'actividades':
		isset($_GET['id']) ? $_GET['id']:'index';
		include 'actividades/actividades.php';
		break;
	case 'inso':
 		include 'ponencias/is/insoftware.php';
		break;
	case 'inso0':
		include 'ponencias/is/insoftware0.php';
		break;
	case 'inso1':
		include 'ponencias/is/insoftware1.php';
		break;
	case 'inso2':
		include 'ponencias/is/insoftware2.php';
		break;
	case 'so':
		include 'ponencias/so/so.php';
		break;
	case 'so0':
		include 'ponencias/so/so0.php';
		break;
	case 'so1':
		include 'ponencias/so/so1.php';
		break;
	case 'so2':
		include 'ponencias/so/so2.php';
		break;
	case 'ig':
		include 'ponencias/ig/ig.php';
		break;
	case 'ig0':
		include 'ponencias/ig/ig0.php';
		break;
	case 'ig1':
		include 'ponencias/ig/ig1.php';
		break;
	case 'ig2':
		include 'ponencias/ig/ig2.php';
		break;
	case 'sc':
		include 'ponencias/sc/sc.php';
		break;
	case 'sc0':
		include 'ponencias/sc/sc0.php';
		break;
	case 'sc1':
		include 'ponencias/sc/sc1.php';
		break;
	case 'sc2':
		include 'ponencias/sc/sc2.php';
		break;
	case 'bd':
		include 'ponencias/bd/bd.php';
		break;
	case 'bd0':
		include 'ponencias/bd/bd0.php';
		break;
	case 'bd1':
		include 'ponencias/bd/bd1.php';
		break;
	case 'bd2':
		include 'ponencias/bd/bd2.php';
		break;
	case 'iu':
		include 'ponencias/iu/iu.php';
		break;
	case 'iu0':
		include 'ponencias/iu/iu0.php';
		break;
	case 'iu1':
		include 'ponencias/iu/iu1.php';
		break;
	case 'iu2':
		include 'ponencias/iu/iu2.php';
		break;
	case 'co':
		include 'ponencias/co/compiladores.php';
		break;
	case 'co0':
		include 'ponencias/co/co0.php';
		break;
	case 'co1':
		include 'ponencias/co/co1.php';
		break;
	case 'co2':
		include 'ponencias/co/co2.php';
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
		include 'index/indexContent.php';
		break;

}
?></div><div id="panelLateral">
<?php 
switch ($categoria) {
	case 'inso0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/is/insoftware1sin.php';
		include 'ponencias/is/insoftware2sin.php';
		break;
	
	case 'inso1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/is/insoftware0sin.php';
		include 'ponencias/is/insoftware2sin.php';
		break;

	case 'inso2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/is/insoftware0sin.php';
		include 'ponencias/is/insoftware1sin.php';
		break;

	case 'so0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/so/so1sin.php';
		include 'ponencias/so/so2sin.php';
		break;
	case 'so1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/so/so0sin.php';
		include 'ponencias/so/so2sin.php';		
		break;
	case 'so2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/so/so0sin.php';
		include 'ponencias/so/so1sin.php';
		break;
	case 'ig0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/ig/ig1sin.php';
		include 'ponencias/ig/ig2sin.php';
		break;
	case 'ig1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/ig/ig0sin.php';
		include 'ponencias/ig/ig2sin.php';		
		break;
	case 'ig2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/ig/ig0sin.php';
		include 'ponencias/ig/ig1sin.php';
		break;
	case 'sc0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/sc/sc1sin.php';
		include 'ponencias/sc/sc2sin.php';
		break;
	case 'sc1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/sc/sc0sin.php';
		include 'ponencias/sc/sc2sin.php';		
		break;
	case 'sc2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/sc/sc1sin.php';
		include 'ponencias/sc/sc2sin.php';
		break;
	case 'bd0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/bd/bd1sin.php';
		include 'ponencias/bd/bd2sin.php';
		break;
	case 'bd1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/bd/bd0sin.php';
		include 'ponencias/bd/bd2sin.php';		
		break;
	case 'bd2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/bd/bd0sin.php';
		include 'ponencias/bd/bd1sin.php';
		break;
	case 'iu0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/iu/iu1sin.php';
		include 'ponencias/iu/iu2sin.php';
		break;
	case 'iu1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/iu/iu0sin.php';
		include 'ponencias/iu/iu2sin.php';		
		break;
	case 'iu2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/iu/iu0sin.php';
		include 'ponencias/iu/iu1sin.php';
		break;
	case 'co0':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/co/co1sin.php';
		include 'ponencias/co/co2sin.php';
		break;
	case 'co1':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/co/co0sin.php';
		include 'ponencias/co/co2sin.php';		
		break;
	case 'co2':
		echo '<h3>Otras ponencias de la sesión</h3>';
		include 'ponencias/co/co0sin.php';
		include 'ponencias/co/co1sin.php';
		break;
	default:
		break;
}
include 'sidebar.php';?>

</div>
</body>
<?php include 'footer.php';?>
</html>