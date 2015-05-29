<?php 
  include_once('dbConnect.php');
  $result;
  $conn=dbConnect();
  $inscripciones = "SELECT * FROM ceiie2015.Inscripcion";
  $resultadoInscripciones = $conn->query($inscripciones);
  $rowsInscripciones = $resultadoInscripciones->fetchAll();
  ?>
 <link rel="stylesheet" href="css/horario.css">
 <table class="table table-hover">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Dirección</th>
        <th>Correo electrónico</th>
        <th>Telefono</th>
      </tr>
    </thead>
    <tbody>
<?php 

  	foreach ($rowsInscripciones as $inscripcionUsuario) {
    $usuarios = "SELECT * FROM ceiie2015.Usuario WHERE Usuario.correo= '".$inscripcionUsuario['Usuario_correo']."'";
    $resultadoUsuarios = $conn->query($usuarios);
    $rowsUsuarios = $resultadoUsuarios->fetchAll();

    foreach ($rowsUsuarios as $usuario) {
    	echo '<tr>';
    	echo '<td><a href="index.php?categoria=inscripcionAdmin&inscripcion='.$inscripcionUsuario['idInscripcion'].'">'.$usuario['nombre'].'</a></td>';
    	echo '<td>' .$usuario['apellidos'].'</td>';
    	echo '<td>' .$usuario['direccion'].'</td>';
    	echo '<td>' .$usuario['correo'].'</td>';
    	echo '<td>' .$usuario['telefono'].'</td>';
    	echo '</tr>';
    }

  }

?>
</tbody>
</table>