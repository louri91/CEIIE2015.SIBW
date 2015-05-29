      <?php include 'apiConnect.php'; 
      /*
      Incluimos la conexión a la API;
      */
            $hoteles = getHoteles();
      ?>
<style>
    input[type=checkbox]{
    display:inline;
}
</style>
      <fieldset class="inscripcion">
         <legend><h2>Datos de inscripción</h2></legend>
         <form id="formularioInscripcion" action="contacta/script_inscripcion.php" method="post">
         <select class="form-control" name="tipo_cuota" style="width:60%">
             <?php 
             //Consutlamos las cuotas de la base de datos y rellenamos la lista
            include_once('dbConnect.php');
            $conn=dbConnect();
            $queryCuotas = "SELECT * FROM ceiie2015.cuota";
            $resultadoCuotas = $conn->query($queryCuotas);
            $rowsCuotas = $resultadoCuotas->fetchAll();
            foreach ($rowsCuotas as $cuota) 
            {
                echo "<option value=".$cuota['idCuota'].">".$cuota['descripcionCuota']." ->".$cuota['precioCuota']."€ </option>";
            }
             ?>
         </select>
         <input type="text" name="nombre" class="form-control" placeholder="Nombre" style="width:60%" required>
         <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" style="width:80%" required>
         <input type="text" name="centro" class="form-control" placeholder="Centro de Trabajo" style="width:80%" required>
         <input type="text" name="telefono" class="form-control" placeholder="Teléfono" style="width:60%" required>
         <input type="email" name="correo" class="form-control" placeholder="Dirección de correo" style="width:100%" required>
         <input type="email" name="correo_conf" class="form-control" placeholder="Confirmar dirección de correo" style="width:100%" required>
         <input type="password" name="pass" class="form-control" placeholder="Contraseña" style="width:80%" required>
         <input type="password" name="pass_conf" class="form-control" placeholder="Confirmar contraseña" style="width:80%" required>
         <fieldset>
         <legend><h2>Actividades extra:</h2></legend>
             <?php 
             //Consutlamos las cuotas de la base de datos y rellenamos la lista
            $queryActividades = "SELECT * FROM ceiie2015.actividad;";
            $resultadoActividades = $conn->query($queryActividades);
            $rowsActividades = $resultadoActividades->fetchAll();
            foreach ($rowsActividades as $actividad) 
            {
                $idAct = $actividad['idActividad'];
                $nombreAct = $actividad['nombreActividad'];
                $precio = $actividad['precio'];
                echo "<input type='checkbox' class='form-control' style='width:6%;height:3%' name='$idAct' value='$idAct' />".$nombreAct." (".$precio."€ )<br>";
            }
             ?>
         </fieldset>
         <br>
         <fieldset>
         <legend><h2>Hotel:</h2></legend>
         <select class="form-control" style="width:80%">
            <?php foreach ($hoteles as $hotel => $value) {
                  echo '<option>Hotel: ';
                  echo $value['nombreHotel'];
                  //echo $hotel;
                  ' </option>';
            }?>
           
         </select>
         </fieldset>
         <br>
         <div style="text-align:center">
             <button type="submit" class="btn btn-primary">Inscribirme</button>
         </div>
         </form>
      </fieldset>