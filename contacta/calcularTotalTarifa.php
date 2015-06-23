<?php 
	include_once('dbConnect.php');
    $conn=dbConnect();
    $arrayAct = array();
	$precioTotal = 0;
	if(isset($_POST['idAct0'])){
		array_push($arrayAct, $_POST['idAct0']);
	}
	if(isset($_POST['idAct1'])){
		array_push($arrayAct, $_POST['idAct1']);
	}
	if(isset($_POST['idAct2'])){
		array_push($arrayAct, $_POST['idAct2']);
	}
	if(isset($_POST['idAct3'])){
		array_push($arrayAct, $_POST['idAct3']);
	}
	if(isset($_POST['idAct4'])){
		array_push($arrayAct, $_POST['idAct4']);
	}
	if(isset($_POST['tipo_cuota'])){
		$tipo_cuota = $_POST['tipo_cuota'];
	}
	if(isset($_POST['habitacion'])){
		$habitacion = intval($_POST['habitacion']);
		$precioTotal = $precioTotal + $habitacion;
	}
	
	$queryCuotas = "SELECT * FROM ceiie2015.cuota WHERE ceiie2015.cuota.idCuota=$tipo_cuota";
    $resultadoCuotas = $conn->query($queryCuotas);
    $resCuota = $resultadoCuotas->fetch();
	$precioTotal = $precioTotal + $resCuota['precioCuota'];
	
	if(count($arrayAct)>0){

		foreach($arrayAct as $actividadSeleccionada){
			$idActividad = intval($actividadSeleccionada);
			$queryActividad = "SELECT * FROM ceiie2015.Actividad WHERE ceiie2015.Actividad.idActividad=$idActividad";
			$resultadoActividad = $conn->query($queryActividad);
			$rowActividad = $resultadoActividad->fetch();
			$precioTotal = $precioTotal + $rowActividad['precio'];
		}
		
	}
	
	echo '<div id="titulo">Total: ';
	echo  $precioTotal;
	echo '€ </div>';
?>