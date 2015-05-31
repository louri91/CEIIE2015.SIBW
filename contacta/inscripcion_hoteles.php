      <?php include 'apiConnect.php'; 
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
                            foreach ($habitaciones as $habitacion => $valueHabitacion) {
                                array_push($habitacionesDisponibles, $valueHabitacion);
                            }
                    }

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
