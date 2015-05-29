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
         <select class="form-control" name="tipo_cuota">
             <?php 
             //Consutlamos las cuotas de la base de datos y rellenamos la lista
            include_once('dbConnect.php');
            $conn=dbConnect();
            $queryCuotas = "SELECT * FROM ceiie2015.cuota";
            $resultadoCuotas = $conn->query($queryCuotas);
            $rowsCuotas = $resultadoCuotas->fetchAll();
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
         <fieldset>
             <legend>
                 <h2>Actividades incluidas:</h2>
             </legend>
             <?php
                 if(isset($tipoCuotaSeleccionada)) {
                    $queryActividadesIncluidas = "SELECT * FROM ceiie2015.Actividad_has_cuota WHERE Cuota_idCuota='".$tipoCuotaSeleccionada."'";
                    $resultadosActCuotas = $conn -> query($queryActividadesIncluidas);
                    $rowsActCuotas = $resultadosActCuotas->fetchAll();
                    foreach ($rowsActCuotas as $actividadIncluida) {
                        $actividad_cuota = "SELECT * FROM ceiie2015.Actividad WHERE idActividad='".$actividadIncluida['Actividad_idActividad']."'";
                        $res = $conn->query($actividad_cuota);
                        $rowsAct = $res->fetch();
                        echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' disabled readonly/>".$rowsAct['nombreActividad']."<br>";
                    }
                }
             ?>

         </fieldset>
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
                echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name='$idAct' value='$idAct'/>".$nombreAct." (".$precio."€ )<br>";
            }
            ?>
         </fieldset>
         <br>
         <fieldset>
         <legend><h2>(Opcional) Hotel:</h2></legend>
         <select class="form-control" style="width:100%">
         <option>Ninguno</option>
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