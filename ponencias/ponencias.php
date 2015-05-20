<?php $categoria = isset($_GET['categoria']);
	include_once('dbConnect.php');
	$conn=dbConnect();
	if(isset($_GET['idPonencia'])){
		$idPonencia = $_GET['idPonencia'];
		$queryPonencias = "SELECT * FROM ceiie2015.Ponencia WHERE ceiie2015.Ponencia.idPonencia=$idPonencia";
		$resultadoPonencias = $conn->query($queryPonencias);
		$rowsPonencias = $resultadoPonencias->fetchAll();
	}
	else{
		$query = "SELECT * FROM ceiie2015.Ponencia";
		$resultado = $conn->query($query);
		$rows = $resultado->fetchAll();
	}

	switch ($categoria) {
		case 'ponencias':?>
		<?php $tema = 'inso';?>
		<h2>INGENIERÍA DEL SOFTWARE</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'so';?>
		<h2>SISTEMAS OPERATIVOS</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'ig';?>
		<h2>INFORMÁTICA GRÁFICA</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'sc';?>
		<h2>SISTEMAS COMPLEJOS</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'bd';?>
		<h2>BASES DE DATOS</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'iu';?>
		<h2>INTERFACES DE USUARIO</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php $tema = 'co';?>
		<h2>COMPILADORES</h2>
      	<div class="row">
		 	<?php foreach ($rows as $row) 
		 	if($row['temaPonencia']==$tema){?>
				<div class="col-lg-4">
				<img class="img-circle" src="<?php echo $row['fotoAutor']?>" width="150" height="150">
				<h2><?php echo $row['nombrePonencia']?>, por <?php echo $row['nombreAutor']?></h2>
				<p><?php echo $row['descripcionPonencia']?></p>
				<p><a class="btn btn-default" href="index.php?categoria=<?php echo $row['idPonencia']?>" role="button">Ver más detalles &raquo;</a></p>
				</div>
		 	<?php }?>
		</div>
		<?php  
		break;
		case 'inso':
		break;
		case 'so':
		break;
		case 'ig':
		break;
		case 'sc':
		break;
		case 'bd':
		break;
		case 'iu':
		break;
		case 'co':
		break;
		
		default:

			break;
	}
		

?>