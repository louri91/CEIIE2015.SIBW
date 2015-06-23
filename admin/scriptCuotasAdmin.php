<?php
	

	if(isset($_POST['submit'])){
		include_once('../dbConnect.php');
		$conn=dbConnect();
		$idCuota = $_POST['idCuota'];
 		$nuevaDescripcionCuota = $_POST['descripcionCuota'];
 		$nuevoPrecio = $_POST['precioCuota'];

 		$queryActualizarCuota = "UPDATE ceiie2015.Cuota SET descripcionCuota='$nuevaDescripcionCuota', precioCuota='$nuevoPrecio' WHERE ceiie2015.Cuota.idCuota='$idCuota'";
 		$resultadoActualizacion = $conn ->query($queryActualizarCuota);
 		if($resultadoActualizacion==true){
 			header( "Refresh:0; url=../index.php?categoria=cuotas", true, 303);
 		}

 	}else{
		include_once('dbConnect.php');
		$conn=dbConnect();
		
		if(isset($_GET['cuota'])){
			$idCuota = $_GET['cuota'];
			$queryCuota = "SELECT * FROM ceiie2015.Cuota WHERE ceiie2015.Cuota.idCuota=$idCuota";
			$resultadoCuota = $conn->query($queryCuota);
			$rowCuota = $resultadoCuota->fetch();
			echo '<fieldset class="inscripcion" style="width: 80%;">';
			echo '<form method="post" action="admin/scriptCuotasAdmin.php">';
			echo '<p class="parrafo"><b> Tipo de Cuota:</b></p>';
			echo '<input type="hidden" name="idCuota" value='.$rowCuota['idCuota'].'>';
			echo '<input type="text" name="descripcionCuota" class="form-control" placeholder="Tipo de Cuota" value='.$rowCuota['descripcionCuota'].' required>';
			echo '<p class="parrafo"><b> Precio de la Cuota:</b></p>';
			echo '<input type="number" min="0" max="300" name="precioCuota" class="form-control" placeholder="Precio Cuota" value='.$rowCuota['precioCuota'].' required>';
			echo '<div style="text-align:center">';
			echo '<button type="submit" value="submit" name="submit" class="btn btn-primary">Actualizar</button>';
			echo '</div>';
			echo '</form>';
			echo '</fieldset>';
	 	}
	 }
?>