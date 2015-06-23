<?php 
    header('Access-Control-Allow-Origin: *'); 
     //Consutlamos las cuotas de la base de datos y rellenamos la lista
    include_once('dbConnect.php');
    $conn=dbConnect();
    $queryCuotas = "SELECT * FROM ceiie2015.cuota";
    $resultadoCuotas = $conn->query($queryCuotas);
    $rowsCuotas = $resultadoCuotas->fetchAll();
?>
<style>
    input[type=checkbox]{
    display:inline;
    }

</style>

<div id="inscripcion_paso1">
    	<br>
      <fieldset class="inscripcion" style="width:80%"  id="inscripcion">
         <legend><h2>Inscripción</h2></legend>
         <form id="formularioInscripcion" action="contacta/script_inscripcion.php" method="post">
         <h2>Datos Personales:</h2>
         <select class="form-control" style="width:100%" name="tipo_cuota" id="tipo_cuota" onchange="Javascript: EjecutarDosFunciones();" >
             <?php             
            foreach ($rowsCuotas as $cuota) 
            {
                
                if(isset($tipo_cuota) && $tipo_cuota==$cuota['idCuota']){
                    echo "<option selected value=".$tipo_cuota.">".$cuota['descripcionCuota']." -> ".$cuota['precioCuota']."€ </option>";
                }
                else
                {
                    echo "<option value=".$cuota['idCuota'].">".$cuota['descripcionCuota']." -> ".$cuota['precioCuota']."€ </option>";
                }
            }
             ?>
         </select>
         <input type="text" id="nombre" name="nombre" style="width:100%" class="form-control" placeholder="Nombre" value='<?php if(isset($nombre)){echo $nombre;}?>' required>
         <input type="text" id="apellidos" name="apellidos" style="width:100%" class="form-control" placeholder="Apellidos" value='<?php if(isset($apellidos)){echo $apellidos;}?>' required>
         <input type="text" id="centro" name="centro" style="width:100%" class="form-control" placeholder="Centro de Trabajo" value='<?php if(isset($centro)){echo $centro;}?>' required>
         <input type="text" id="direccion" name="direccion" style="width:100%" class="form-control" placeholder="Direccion" value='<?php if(isset($direccion)){echo $direccion;}?>' required>
         <input type="text" id="telefono" name="telefono" style="width:100%" class="form-control" placeholder="Teléfono" value='<?php if(isset($telefono)){echo $telefono;}?>' required>
         <input type="email" id="correo" name="correo" style="width:100%" class="form-control" placeholder="Dirección de correo" value='<?php if(isset($correo)){echo $correo;}?>' required>
         <input type="email" id="correo_conf" name="correo_conf" style="width:100%" class="form-control" placeholder="Confirmar dirección de correo" required>
         <input type="password" id="pass" name="pass" style="width:100%" class="form-control" placeholder="Contraseña" required>
         <input type="password" id="pass_conf" name="pass_conf" style="width:100%" class="form-control" placeholder="Confirmar contraseña" required>
         <br>
         
         <div id="resultado_busquedacuota" style="margin-bottom:3%">
         </div>
            <h2>Actividades extra: (Opcional)</h2>
             <?php 
    	   
            $queryActividades = "SELECT * FROM ceiie2015.actividad;";
            $resultadoActividades = $conn->query($queryActividades);
            $rowsActividades = $resultadoActividades->fetchAll();
            foreach ($rowsActividades as $actividad) 
            {
                if(isset($rowsAct['nombreActividad'])){
                    if($actividad['nombreActividad']!=$rowsAct['nombreActividad']){
                        $idAct = $actividad['idActividad'];
                        $nombreAct = $actividad['nombreActividad'];
                        $precio = $actividad['precio'];
                        if(isset($datos) && in_array($idAct, $datos)){
                            echo "<input type='checkbox' class='form-control' id='actividad[]' class='actividades' style='width:6%;height:3%;' name='actividad[]' value='$idAct' checked/>".$nombreAct." (".$precio."€)<br>";
                        }else{
                        echo "<input type='checkbox' class='form-control' id='actividad[]' class='actividades' style='width:6%;height:3%;' name='actividad[]' value='$idAct'/>".$nombreAct." (".$precio."€)<br>";
                        }
                    }
                }else{
                    $idAct = $actividad['idActividad'];
                    $nombreAct = $actividad['nombreActividad'];
                    $precio = $actividad['precio'];
                    if(isset($datos) && in_array($idAct, $datos)){
                            echo "<input type='checkbox' class='form-control' id='actividad[]' class='actividades' style='width:6%;height:3%;' name='actividad[]' value='$idAct' checked/>".$nombreAct." (".$precio."€)<br>";
                        }else{
                        echo "<input type='checkbox' class='form-control' id='actividad[]' onclick='JavaScript: cambiarTotal();' class='actividades' style='width:6%;height:3%;' name='actividad[]' value='$idAct'/>".$nombreAct." (".$precio."€)<br>";
                    }
                }

            }
            ?>

            <?php
            include 'apiConnect.php'; 
            $hoteles = getHoteles();
            ?>
            
            <h2>Alojamiento: (Opcional)</h2>
            <?php
                $habitacionesDisponibles = array(); 
                    foreach ($hoteles as $hotel => $value) {
                        $habitaciones = getHabitaciones($value['codigoHotel']);
                            if(count($habitaciones)>0)
                            {
                                foreach ($habitaciones as $habitacion => $valueHabitacion) {
                                    array_push($habitacionesDisponibles, $valueHabitacion);
                                }
                            }
                    }
                echo '<fieldset class="fechas" style="width:90%;">';
                echo '<legend><h2>Fechas </h2></legend>';
                echo '<br><p><h3>Entrada: </h3>';
                echo '<input type="date" class="actividades" class="form-control" name="fechaEntrada" step="1" min="2015-06-02" max="2015-06-30" value="2015-06-04"><br>';
                echo '<br><h3>Salida: </h3>';
                echo '<input type="date" class="actividades" class="form-control" name="fechaSalida" step="1" min="2015-06-02" max="2015-06-30" value="2015-06-06"><br>';
                echo '</p></fieldset><br>';

                foreach ($hoteles as $hotel => $value) {
                echo '<fieldset class="inscripcion" style="width:90%;">';
                echo '<legend><h2>' .$value['nombreHotel']. ' ('.$value['estrellas'].' estrellas)</h2></legend>';
                echo ' <p class="parrafo"><b>Descripción:</b><br> '.$value['descripcionHotel'];
                echo '<br>';
                echo '<br><b>Habitaciones Disponibles: </b><br>';

                foreach ($habitacionesDisponibles as $habitacion => $valueHabitacion) {
                    if($valueHabitacion['Hotel_codigoHotel']==$value['codigoHotel']){
                    echo '<input type="checkbox" class="actividades" onclick="cambiarTotal();" class="form-control" name="habitacion[]" name='.$valueHabitacion['numHabitacion'].' value='.$valueHabitacion['precioHabitacion'].'>Habitación '.$valueHabitacion['tipoHabitacion'];
                    echo ' (' .$valueHabitacion['precioHabitacion']. ' €)';
                    echo '<br>';
                    }
                }
            echo '</p></fieldset>';
            echo '<br>';
            }
        ?>
        <br>

        <div id="totalInscripcion">
           <div id="titulo">Total: 0€</div>
        </div>     
        <div style="text-align:right">
        <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
        </form>
       
        </fieldset>
        </div>

<script>
    function EjecutarDosFunciones()
    {
       cambiarTotal();
       MostrarConsultaActividad();
    }
    </script>