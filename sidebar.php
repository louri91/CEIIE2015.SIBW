<?php if(isset($_GET['idPonencia'])){
	$idPonencia = $_GET['idPonencia'];
	include_once('dbConnect.php');
	$conn=dbConnect();
	$query = "SELECT * FROM ceiie2015.Ponencia WHERE ceiie2015.Ponencia.idPonencia=$idPonencia";
	$result = $conn ->query($query);
	$row = $result->fetchAll();?>
	<h3>Más ponencias de la sesión</h3>
	<?php
	foreach ($row as $r) {
		$temaPonencia = $r['temaPonencia'];
		$queryPon = "SELECT * FROM ceiie2015.Ponencia WHERE ceiie2015.Ponencia.temaPonencia='$temaPonencia'";
		$resultadoPon = $conn->query($queryPon);
		$rowsPon = $resultadoPon->fetchAll();
		foreach ($rowsPon as $pon) {
			if($pon['idPonencia']!=$idPonencia){?>
			<h4><a href="index.php?idPonencia=<?php echo $pon['idPonencia'];?>"><?php echo $pon['nombrePonencia'];?>, por <?php echo $pon['nombreAutor'];?></a></h4>
	<?php }}  
	}
}
$conn = null;
?>

<h4><b>Fechas Importantes:</b></h4> 4, 5 y 6 de Junio
<h4><b>Enlaces Importantes</b></h4>
<a href="http://etsiit.ugr.es">ETSIIT</a><br>
<a href="http://ugr.es">UGR</a><br>

<h4>Últimas Noticias</h4>
Si quieres colaborar con nosotros envíanos un correo electrónico a <a href='mailto:congreso@etsiit.ugr.es'>congreso@etsiit.ugr.es</a>
<h4>¡Síguenos en Twitter!</h4>
<div class="contenedor-anuncio">
  <a class="twitter-timeline" href="https://twitter.com/CEIIE2015" data-widget-id="580037138839912449"></a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>