      <?php 
            if(!isset($_COOKIE['usuario'])){
                echo '<script language="javascript">alert("Los datos de usuario son obligatorios");</script>';
                header( "Refresh:0; url=index.php?categoria=inscripcion&p=0", false, 303);
            }

            include 'apiConnect.php'; 
        /*
          Incluimos la conexión a la API;
          */    
            include_once 'dbConnect.php';
            $conn = dbConnect();
            $hoteles = getHoteles();

            $queryActividades = "SELECT * FROM ceiie2015.actividad";
            $resultadoActividades = $conn->query($queryActividades);
            $rowsActvidades = $resultadoActividades->fetchAll();
            $actividades_marcadas = array();
            $precio=0;
            foreach ($rowsActvidades as $actividad) 
            {
                    if (isset($_POST[$actividad['idActividad']])) 
                    {
                        $precio+=$actividad['precio'];//Acumulamos precio
                        array_push($actividades_marcadas, $actividad['idActividad']);
                    }  
            }
            setcookie('usuario_actividades', serialize($actividades_marcadas), time()+3600, "/");
      ?>
<style>
    input[type=checkbox]{
    display:inline;
    }
</style>
     <ol class="breadcrumb">
      <li><a href="index.php?categoria=inscripcion&p=0">Datos Personales</a></li>
      <li><a href="index.php?categoria=inscripcion&p=1">Actividades</a></li>
      <li class="active"><a href="index.php?categoria=inscripcion&p=2">Alojamiento</a></li>
    </ol>
        <h2>Alojamiento: (Opcional)</h2>
        <form id="formularioAlojamiento" action="contacta/script_inscripcion.php" method="post">
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
                echo '<fieldset class="fechas" style="width=10%;">';
                echo '<legend><h2>Fechas: </h2></legend>';
                echo '<br><p><h3>Entrada: </h3><br>';
                echo '<input type="date" class="actividades" class="form-control" name="fechaEntrada" step="1" min="2015-06-02" max="2015-06-30" value="2015-06-04"><br>';
                echo '<br><h3>Salida: </h3><br>';
                echo '<input type="date" class="actividades" class="form-control" name="fechaSalida" step="1" min="2015-06-02" max="2015-06-30" value="2015-06-06"><br>';
                echo '</p></fieldset>';

                foreach ($hoteles as $hotel => $value) {
                echo '<fieldset class="inscripcion" style="width:80%;">';
                echo '<legend><h2>' .$value['nombreHotel']. ' ('.$value['estrellas'].' estrellas)</h2></legend>';
                echo ' <p class="parrafo"><b>Descripción:</b><br> '.$value['descripcionHotel'];
                echo '<br>';
                echo '<br><b>Habitaciones Disponibles: </b><br>';

                foreach ($habitacionesDisponibles as $habitacion => $valueHabitacion) {
                    if($valueHabitacion['Hotel_codigoHotel']==$value['codigoHotel']){
                    echo '<input type="checkbox" class="actividades" class="form-control" id="habitacion" name='.$valueHabitacion['numHabitacion'].' value='.$valueHabitacion['numHabitacion'].'>Habitación '.$valueHabitacion['tipoHabitacion'];
                    echo ' (' .$valueHabitacion['precioHabitacion']. ' €)';
                    echo '<br>';
                    }
                }
            echo '</p></fieldset>';
            echo '<br>';
            }

        ?>

        <br>
        <div style="text-align:right">
            <input type="submit" name="submit" value="Siguiente" class="btn btn-primary"/>
        </div>
        </form>
