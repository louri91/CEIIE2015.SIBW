<?php
	

	if(isset($_POST['submit'])){
		include_once('../dbConnect.php');
		$conn=dbConnect();
		$idActividad = $_POST['idActividad'];
 		$nuevoNombreActividad = $_POST['nombreActividad'];
 		$nuevoDescripcionActividad = $_POST['descripcionActividad'];
 		$nuevoPrecio = $_POST['precio'];

 		$queryActualizarActividad = "UPDATE ceiie2015.Actividad SET nombreActividad='$nuevoNombreActividad', descripcionActividad='$nuevoDescripcionActividad', precio='$nuevoPrecio' WHERE ceiie2015.Actividad.idActividad='$idActividad'";
 		$resultadoActualizacion = $conn ->query($queryActualizarActividad);
 		if($resultadoActualizacion==true){
 			header( "Refresh:0; url=../index.php?categoria=actividades&id=$idActividad", true, 303);
 		}

 	}else{
		include_once('dbConnect.php');
		$conn=dbConnect();
		
		if(isset($_GET['id'])){
			$idActividad = $_GET['id'];
			$queryActividad = "SELECT * FROM ceiie2015.Actividad WHERE ceiie2015.Actividad.idActividad=$idActividad";
			$resultadoActividad = $conn->query($queryActividad);
			$rowActividad = $resultadoActividad->fetch();
			echo '<fieldset class="inscripcion" style="width: 80%;">';
			echo '<form method="post" action="admin/scriptActAdmin.php">';
			echo '<p class="parrafo"><b> Nombre de la Actividad:</b></p>';
			echo '<input type="hidden" name="idActividad" value='.$rowActividad['idActividad'].'>';
			echo '<input type="text" name="nombreActividad" class="form-control" placeholder="Nombre Actividad" value='.$rowActividad['nombreActividad'].' required>';
			echo '<p class="parrafo"><b> Descripción de la Actividad:</b></p>';
			echo '<textarea rows="3" name="descripcionActividad" class="form-control" style="height:15%" required>'.$rowActividad['descripcionActividad'].'</textarea>';
			echo '<p class="parrafo"><b> Precio de la Actividad:</b></p>';
			echo '<input type="number" min="0" max="300" name="precio" class="form-control" placeholder="Precio Actividad" value='.$rowActividad['precio'].' required>';

			echo '<div style="text-align:center">';
			echo '<button type="submit" value="submit" name="submit" class="btn btn-primary">Actualizar</button>';
			echo '</div>';
			echo '</form>';
			echo '</fieldset>';
	 	}
	 }
?>