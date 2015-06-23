<?php 
  include_once('dbConnect.php');
  $result;
  $conn=dbConnect();
  $cuotas = "SELECT * FROM ceiie2015.Cuota";
  $resCuotas = $conn->query($cuotas);
  $rowsCuotas = $resCuotas->fetchAll();
  ?>
 <link rel="stylesheet" href="css/horario.css">
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Tipo de Cuota</th>
        <th>Precio Cuota</th>
      </tr>
    </thead>
    <tbody>
<?php 

  	foreach ($rowsCuotas as $cuota) {

    	echo '<tr>';
    	echo '<td><a href="index.php?categoria=cuotas&cuota='.$cuota['idCuota'].'">' .$cuota['descripcionCuota'].'</a></td>';
    	echo '<td>' .$cuota['precioCuota'].'</td>';
    	echo '</tr>';
    }

?>
</tbody>
</table>