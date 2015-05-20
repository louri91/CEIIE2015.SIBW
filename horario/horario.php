<?php 
  include_once('dbConnect.php');
  $result;
  $conn=dbConnect();
  $query = "SELECT * FROM ceiie2015.Ponencia";
  $resultado = $conn->query($query);
  $rows = $resultado->fetchAll();
    
?>
   <link rel="stylesheet" href="css/horario.css">
   <table class="table table-hover">
    <thead>
      <tr>
        <th>Hora</th>
        <th>4 Junio</th>
        <th>5 Junio</th>
        <th>6 Junio</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>9:00-11:00</td>
        <td><a href="index.php?categoria=inso">ING. SOFTWARE</a><br> 
        <?php foreach ($rows as $row) { 
        if($row['temaPonencia']=='inso') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
        <?php }
        }?>
        </td>
        <td>
            <a href="index.php?categoria=so">SISTEMAS OPERATIVOS</a><br> 
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='so') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
        <td>Aún por determinar</td>
      </tr>
      <tr>
        <td>11:00-11:30</td>
        <td >Pausa para café</td>
        <td >Pausa para café</td>
        <td >Pausa para café</td>
      </tr>
      <tr>
        <td>11:30-13:30</td>
        <td><a href="index.php?categoria=ig">INFORMÁTICA GRÁFICA</a><br>
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='ig') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
          </td>
        <td><a href="index.php?categoria=sc">SISTEMAS COMPLEJOS</a><br>
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='sc') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
            </td>
        <td>Aún por determinar</td>
      </tr>
      <tr>
        <td>13:30-15:00</td>
        <td >Pausa para comer</td>
        <td >Pausa para comer</td>
        <td >Pausa para comer</td>
      </tr>
      <tr>
        <td>15:00-17:00</td>
        <td><a href="index.php?categoria=bd">BASES DE DATOS</a> <br> 
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='bd') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
            </td>
        <td><a href="index.php?categoria=iu">INTERFACES DE USUARIO</a> <br> 
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='iu') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
            </td>
        <td>Aún por determinar</td>
      </tr>
      <tr>
        <td>11:00-11:30</td>
        <td >Pausa para café</td>
        <td >Pausa para café</td>
        <td >Pausa para café</td>
      </tr>
      <tr>
        <td>11:30-13:30</td>
        <td><a href="index.php?categoria=co">COMPILADORES</a> <br> 
        <?php foreach ($rows as $row) { 
          if($row['temaPonencia']=='co') { ?>
            <a href="index.php?categoria=<?php echo $row['idPonencia']?>"><b><?php echo $row['nombrePonencia'];?></b></a>, por <?php echo $row['nombreAutor'];?><br>
            <?php }
            }?>
            </td>
        <td>TRABAJOS FIN DE GRADO <br> Mesa Redonda y sesión de posters</td>
        <td>Aún por determinar</td>
      </tr>
    </tbody>
  </table>
  <?php 
  $conn = null;
  ?>