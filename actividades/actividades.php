<?php
if(isset($_GET['id']))
{
	$handle = fopen("actividades/datos.txt", "r");
	if ($handle) 
	{
		$encontrado = false;
		while (($line = stream_get_line($handle,100000,'**')) !== false && $encontrado==false) 
		{
			$line = utf8_encode($line);
			list($id, $nombre, $descripcion, $imagenes) = split(";", $line, 4);
			if($id==$_GET['id'])
			{
				$encontrado=true;
				$list_imagenes = explode("|", $imagenes);
				?>
				<h3><?php echo $nombre ?></h3>
				<p class="parrafo"><?php echo $descripcion ?></p>
				<?php
				foreach ($list_imagenes as $img) 
				{
					?>
					<img src=<?php echo $img ?> width=80% style="margin:0.5%" >
					<?php
				}
			}
		}
		if($encontrado==false)
			echo "No se encuentra el id de la actividad";
		fclose($handle);
	} 
	else 
	{
		echo "Error abriendo el archivo de datos.";
	}
}
else
{
	$handle = fopen("actividades/datos.txt", "r");
	if ($handle) 
	{
		while (($line = stream_get_line($handle,100000,'**')) !== false) 
		{
			$line = utf8_encode($line);
			list($id, $nombre, $descripcion, $imagenes) = split(";", $line, 4);
				$list_imagenes = explode("|", $imagenes);
				?>
				<h3><?php echo $nombre ?></h3>
				<p class="parrafo"><?php echo $descripcion ?></p>
				<?php
				foreach ($list_imagenes as $img) 
				{
					?>
					<img src=<?php echo $img ?> width=80% style="margin:0.5%" >
					<?php
				}
			}
		}
		fclose($handle);
} 



?>