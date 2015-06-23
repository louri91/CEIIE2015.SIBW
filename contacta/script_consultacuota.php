<?php 
  if(isset($_GET['tipo_cuota']))
  {
      $cuota = $_GET['tipo_cuota'];
  include_once('../dbConnect.php');
  $result;
  $conn=dbConnect();
  $queryCuotas = "SELECT * FROM ceiie2015.cuota WHERE ceiie2015.cuota.idCuota=$cuota";
	    $resultadoCuotas = $conn->query($queryCuotas);
	    $resCuota = $resultadoCuotas->fetch();
		echo '<div id="titulo">Total Cuota: ';
		echo  $resCuota['precioCuota'];
		echo '€ </div>';
    echo '<h2>Actividades incluidas:</h2>';
  $inscripciones = "select A.idActividad, A.nombreActividad, A.precio, A.descripcionActividad from actividad A, actividad_has_cuota C where A.idActividad = C.Actividad_idActividad and  C.Cuota_idCuota = '$cuota'";
  $resultadoInscripciones = $conn->query($inscripciones);
  $rowsInscripciones = $resultadoInscripciones->fetchAll();
  if(Count($rowsInscripciones)>0)
      {?>
<table class="table table-hover">
    <thead>
      <tr>
        <th width="10%">Actividad</th>
        <th width="5%" >Precio</th>
        <th width="60%">Descripción</th>
        <th width="25%">Imágenes</th>
      </tr>
    </thead>
    <tbody>
<?php 
        foreach ($rowsInscripciones as $actividad) 
        {
            $imagenes = "select rutaImagen from imagen where Actividad_idActividad = ".$actividad['idActividad']." ";
  $resultadoImagenes = $conn->query($imagenes);
  $rowsImagenes = $resultadoImagenes->fetchAll();
  
    	echo '<tr>';
    	echo '<td style=font-size:14px;>' .$actividad['nombreActividad'].'</td>';
    	echo '<td style=font-size:14px;>' .$actividad['precio'].'</td>';
    	echo '<td style=font-size:12px;>' .$actividad['descripcionActividad'].'</td>';
        if(Count($rowsImagenes)>0)
        {
            echo '<td>';
            foreach ($rowsImagenes as $imagen) 
            {
            echo '<img width="100%" src='.$imagen['rutaImagen'].'></img>';
            }
            echo '</td>';
        }
    	echo '</tr>';
        }
  }
 else {
      
    echo "No existen actividades para esta cuota";
     
 }

      
  }
?>
<br>