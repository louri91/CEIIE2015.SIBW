<?php
  include_once('dbConnect.php');
  $conn=dbConnect();
  


if(isset($_GET['inscripcion'])){
	
	$inscripcion = $_GET['inscripcion'];
	echo $inscripcion;
	$inscripciones = "SELECT * FROM ceiie2015.Inscripcion WHERE Inscripcion.idInscripcion='".$inscripcion."'";
  	$resultadoInscripciones = $conn->query($inscripciones);
  	$rowsInscripciones = $resultadoInscripciones->fetch();

	echo '<link rel="stylesheet" href="css/horario.css">';
	echo '<table class="table table-hover">';
    echo '<thead>';
		echo '<tr>';
	echo '<th> Precio </th>';
	echo '<th> Fecha de Inscripción</th>';
	echo '<th> Tipo de Cuota Elegida </th>';
	echo '<th> Actividades Contratadas </th>';
	echo '</tr>';

	echo '<tr>';
	echo '<td>' .$rowsInscripciones['precioFinal']. '</td>';
	echo '<td>' .$rowsInscripciones['fechaInscripcion']. '</td>';
	
	$queryActividadesInscripcion = "SELECT * FROM ceiie2015.Inscripcion_has_actividad WHERE Inscripcion_has_actividad.Inscripcion_idInscripcion = '".$inscripcion."'";
	$queryCuota = "SELECT * FROM ceiie2015.Cuota WHERE Cuota.idCuota = '".$rowsInscripciones['Cuota_idCuota']."'";
	$resultadosActividadesInscripcion = $conn->query($queryActividadesInscripcion);
	$resultadoCuota = $conn->query($queryCuota);
	$rowsActividades = $resultadosActividadesInscripcion -> fetchAll();
	$rowCuota = $resultadoCuota ->fetch();
	echo '<td>'.$rowCuota['descripcionCuota'].'</td>';
	echo '<td>';
	foreach ($rowsActividades as $actividadInscrita) {
		$act = "SELECT * FROM ceiie2015.Actividad WHERE idActividad='".$actividadInscrita['Actividad_idActividad']."'";
		$resAct = $conn ->query ($act);
		$rowActividad = $resAct -> fetch();
		echo $rowActividad['nombreActividad'];
		echo '<br>';
	}
	echo '</td>';
	echo '</tr>';

	echo '</thead>';
	echo '</table>';
}
?>