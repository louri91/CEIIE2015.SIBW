<?php 
     //Consutlamos las cuotas de la base de datos y rellenamos la lista
    include_once('dbConnect.php');
    $conn=dbConnect();
    $queryCuotas = "SELECT * FROM ceiie2015.cuota";
    $resultadoCuotas = $conn->query($queryCuotas);
    $rowsCuotas = $resultadoCuotas->fetchAll();
    if(isset($_COOKIE['Usuario'])){
        
    }
?>
<style>
    input[type=checkbox]{
    display:inline;
    }
</style>
    <ol class="breadcrumb">
      <li class="active"><a href="index.php?categoria=inscripcion&p=0">Datos Personales</a></li>
      <li><a href="index.php?categoria=inscripcion&p=1">Actividades</a></li>
      <li><a href="index.php?categoria=inscripcion&p=2">Alojamiento</a></li>
    </ol>
      <fieldset class="inscripcion">
         <legend><h2>Datos de inscripción</h2></legend>
         <form id="formularioInscripcion" action="index.php?categoria=inscripcion&p=1" method="post">
         <select class="form-control" name="tipo_cuota">
             <?php             
            foreach ($rowsCuotas as $cuota) 
            {
                if($cuota['idCuota']=='1'){
                    $tipoCuotaSeleccionada = $cuota['idCuota'];
                    echo "<option selected value=".$cuota['idCuota'].">".$cuota['descripcionCuota']." -> ".$cuota['precioCuota']."€ </option>";
                }
                else
                {
                    echo "<option value=".$cuota['idCuota'].">".$cuota['descripcionCuota']." -> ".$cuota['precioCuota']."€ </option>";
                }
            }
             ?>
         </select>
         <input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
         <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" required>
         <input type="text" name="centro" class="form-control" placeholder="Centro de Trabajo" required>
         <input type="text" name="direccion" class="form-control" placeholder="Direccion" required>
         <input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
         <input type="email" name="correo" class="form-control" placeholder="Dirección de correo" required>
         <input type="email" name="correo_conf" class="form-control" placeholder="Confirmar dirección de correo" required>
         <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
         <input type="password" name="pass_conf" class="form-control" placeholder="Confirmar contraseña" required>
         <br>
         <div style="text-align:right">
            <button type="submit" class="btn btn-primary">Siguiente</button>
         </div>
         </form>
      </fieldset>