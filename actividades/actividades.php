<?php 
	include_once('dbConnect.php');
	$result;
	$conn=dbConnect();
	$idActividad = $_GET['id'];
	$query = "SELECT * FROM ceiie2015.Actividad";
	$queryActividad = "SELECT * FROM ceiie2015.Actividad WHERE ceiie2015.Actividad.idActividad=$idActividad";
	$result = $conn->query($query);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
    	$id = $row['idActividad'];
    	$queryImagenes = "SELECT * FROM ceiie2015.Imagen WHERE ceiie2015.imagen.Actividad_idActividad=$id";
    	$resultImagenes = $conn->query($queryImagenes);
    	$rowImagenes = $resultImagenes->fetchAll();
    ?>
    	<h3><?php echo $row['nombreActividad'];?></h3>
    	<p class='parrafo'><?php echo $row['descripcionActividad'];?></p>
    	<p class='parrafo'>Precio: <?php echo $row['precio'];?></p>
    	<?php 
    	foreach ($rowImagenes as $imagen) {?>
    		<img src="<?php echo $imagen['rutaImagen'];?>" width=80% style='margin:0.5%'>
    	<?php }
    }
?>