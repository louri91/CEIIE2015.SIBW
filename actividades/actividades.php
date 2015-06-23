<?php 
	include_once('dbConnect.php');
	$result;
	$conn=dbConnect();
	if(isset($_GET['id'])){
		$idActividad = $_GET['id'];
		$queryActividad = "SELECT * FROM ceiie2015.Actividad WHERE ceiie2015.Actividad.idActividad=$idActividad";
		$resultadoActividad = $conn->query($queryActividad);
		$rowActividad = $resultadoActividad->fetchAll();
		$queryImagenes = "SELECT * FROM ceiie2015.Imagen WHERE ceiie2015.imagen.Actividad_idActividad=$idActividad";
		$resultImagenes = $conn->query($queryImagenes);
    	$rowImagenes = $resultImagenes->fetchAll();

        foreach ($rowActividad as $actividad) {
?>
    	<h3><?php echo $actividad['nombreActividad']; echo '  '; if(isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true){
            if($_SESSION['nombre_perfil']=='admin'){
                    echo '<a href="index.php?categoria=actAdmin&id='.$actividad['idActividad'].'" class="btn btn-primary">Editar</a>';
                }
            }
        ?></h3>
    	<p class='parrafo'><?php echo $actividad['descripcionActividad'];?></p>
    	<p class='parrafo'>Precio: <?php echo $actividad['precio'];?> €</p>
    	<?php 
    	foreach ($rowImagenes as $imagen) {?>
    		<img src="<?php echo $imagen['rutaImagen'];?>" width=80% style='margin:0.5%'>
    	<?php }    
    }

	}else{
	$query = "SELECT * FROM ceiie2015.Actividad";
	$result = $conn->query($query);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
    	$id = $row['idActividad'];
    	$queryImagenes = "SELECT * FROM ceiie2015.Imagen WHERE ceiie2015.imagen.Actividad_idActividad=$id";
    	$resultImagenes = $conn->query($queryImagenes);
    	$rowImagenes = $resultImagenes->fetchAll();
    ?>
    	<h3><?php echo $row['nombreActividad'];
        echo '  '; if(isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true){
            if($_SESSION['nombre_perfil']=='admin'){
                    echo '<a href="index.php?categoria=actAdmin&id='.$row['idActividad'].'" class="btn btn-primary">Editar</a>';
                }
            }
        ?></h3>
    	<p class='parrafo'><?php echo $row['descripcionActividad'];?></p>
    	<p class='parrafo'>Precio: <?php echo $row['precio'];?> €</p>
    	<?php 
    	foreach ($rowImagenes as $imagen) {?>
    		<img src="<?php echo $imagen['rutaImagen'];?>" width=80% style='margin:0.5%'>
    	<?php }
    }
}
$conn=null;
?>