<?php
    /*Comprobamos si se ha obtenido correo y pass por medio de un formulario
     *en el cas de que se reciba algun dato en ambos se realizar� la consulta.
     * En el caso de que existe el usuario que ha iniciado sesi�n, asignamos
     * las variables globales de nombre_perfil y sesion_iniciada.

     */    

    include '../apiConnect.php'; 
    $habitacionesHotel1 = getHabitaciones('001');
    $habitacionesHotel2 = getHabitaciones('002');
    $habitacionesHotel3 = getHabitaciones('003');
    $habitacionesHotel4 = getHabitaciones('004');
    $contador = 0;

    foreach ($habitacionesHotel1 as $h1 => $valueh1) {
        if(isset($_POST[$valueh1['numHabitacion']])){
            $codigoHotel1 = $valueh1['Hotel_codigoHotel'];
            $habitacion1 = $valueh1['numHabitacion'];
            $contador = $contador + 1;
        }
    }
    foreach ($habitacionesHotel2 as $h2 => $valueh2) {
        if(isset($_POST[$valueh2['numHabitacion']])){
            $codigoHotel2 = $valueh2['Hotel_codigoHotel'];
            $habitacion2 = $valueh2['numHabitacion'];
            $contador = $contador + 1;
        }
    }
    foreach ($habitacionesHotel3 as $h3 => $valueh3) {
        if(isset($_POST[$valueh3['numHabitacion']])){
            $codigoHotel3 = $valueh3['Hotel_codigoHotel'];
            $habitacion3 = $valueh3['numHabitacion'];
            $contador = $contador + 1;
        }
    }
    foreach ($habitacionesHotel4 as $h4 => $valueh4) {
        if(isset($_POST[$valueh4['numHabitacion']])){
            $codigoHotel4 = $valueh4['Hotel_codigoHotel'];
            $habitacion4 = $valueh4['numHabitacion'];
            $contador = $contador + 1;
        }
    }

    if(isset($codigoHotel1) && (isset($habitacion1))){
        setReserva($codigoHotel1, $habitacion1);
    }
    if(isset($codigoHotel2) && (isset($habitacion2))){
        setReserva($codigoHotel2, $habitacion2);
    }
    if(isset($codigoHotel3) && (isset($habitacion3))){
        setReserva($codigoHotel3, $habitacion3);
    }
    if(isset($codigoHotel4) && (isset($habitacion4))){
        setReserva($codigoHotel4, $habitacion4);
    }

    if($contador > 1){
        echo '<script language="javascript">alert("Solamente puedes seleccionar una habitación y un hotel.");</script>';
        header( "Refresh:1; url=../index.php?categoria=inscripcion&p=2", false, 303);
    }
    

    if(isset($_COOKIE['usuario'])){
        $cookieUsuario = $_COOKIE['usuario'];
        $datos = unserialize($cookieUsuario);
        $nombre = $datos[0];
        $apellidos = $datos[1];
        $centro = $datos[2];
        $direccion = $datos[3];
        $telefono = $datos[4];
        $correo = $datos[5];
        $pass = $datos[6];
        $tipo_cuota = $datos[7];
    }

    if(isset($_COOKIE['usuario_actividades'])){
        $cookieUsuarioActividades = $_COOKIE['usuario_actividades'];
        $actividades_marcadas = unserialize($cookieUsuarioActividades);
    }

    include_once('../dbConnect.php');

    $conn=dbConnect();
    
    $queryUsuario = "INSERT INTO usuario (correo,pass,nombre,apellidos,telefono,direccion) values ('".$correo."','".$pass."','".$nombre."','".$apellidos."','".$telefono."','".$direccion."')";
    $resultadoRegistro = $conn->query($queryUsuario);
    if ($resultadoRegistro == true) 
    {
        $precio = 0;
        $queryPrecio = "SELECT precioCuota FROM ceiie2015.cuota WHERE idCuota='".$tipo_cuota."'";
        $resultadoPrecio = $conn->query($queryPrecio);
        $rowsPrecio = $resultadoPrecio->fetch();
        if ($rowsPrecio != false) {
            $precio=$rowsPrecio[0];
        }

        $queryActividades = "SELECT * FROM ceiie2015.actividad";
        $resultadoActividades = $conn->query($queryActividades);
        $rowsActvidades = $resultadoActividades->fetchAll();
        foreach ($rowsActvidades as $actividad) 
        {
            if (in_array($actividad['idActividad'], $actividades_marcadas)) 
            {
                $precio+=$actividad['precio'];//Acumulamos precio
            }  
        }

        $fechaInscripcion = date('Y-m-d H:i:s');
        $queryInsertInscripcion = "INSERT INTO inscripcion (precioFinal,fechaInscripcion,Cuota_idCuota,Usuario_correo,centroTrabajo) values ('".$precio."','".$fechaInscripcion."','".$tipo_cuota."','".$correo."','".$centro."')";
        $resultadoInsertInscripcion = $conn->query($queryInsertInscripcion);
        if ($resultadoInsertInscripcion == true) 
        {
            $idInscripcion = $conn->lastInsertId('inscripcion');
            foreach($actividades_marcadas as $idAct)
            {
                $queryInsertInscripcionActividad = "INSERT INTO inscripcion_has_actividad (Inscripcion_idInscripcion,Actividad_idActividad) values ('".$idInscripcion."','".$idAct."')";
                $resultadoInsertInscripcionActividad = $conn->query($queryInsertInscripcionActividad);
            }
        }
    }
    if($resultadoRegistro==true && $resultadoInsertInscripcion==true){
	    echo '<script language="javascript">alert("¡Muchas Gracias! Se ha inscrito correctamente en el congreso.");</script>';
	    session_start();
	            $_SESSION["nombre_perfil"]=$nombre;
	            $_SESSION["sesion_iniciada"]=true;
	    header( "Refresh:0; url=../index.php?categoria=index", true, 303);
	}
	else if($resultadoRegistro==false){
	    echo '<script language="javascript">alert("No se ha podido realizar el registro de usuario");</script>';
	   	header( "Refresh:0; url=../index.php?categoria=inscripcion", true, 303);
	}
	else if($resultadoInsertInscripcion==false){
	    echo '<script language="javascript">alert("No se ha podido realizar la inscripción. Compruebe de nuevo sus datos.");</script>';	
	    header( "Refresh:0; url=../index.php?categoria=inscripcion", true, 303);	
	}

?>