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
    $fechaEntrada = 0;
    $fechaSalida = 0;
    

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

    $codigoHotelGuardado = 0;
    $codigoHabitacionGuardado = 0;
    
    if($contador > 1){
            echo '<script language="javascript">alert("Solamente puedes seleccionar una habitación y un hotel.");</script>';
            header( "Refresh:1; url=../index.php?categoria=inscripcion&p=2", false, 303);
    }
    else{

        if(isset($codigoHotel1) && (isset($habitacion1))){
            $codigoHotelGuardado = $codigoHotel1;
            $codigoHabitacionGuardado = $habitacion1;
            if(isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida'])){
                $fechaEntrada = $_POST['fechaEntrada'];
                $fechaSalida = $_POST['fechaSalida'];
                if($fechaEntrada<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de entrada es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaSalida<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>$fechaSalida){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha de entrada.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>date('Y-m-d') && $fechaSalida>date('Y-m-d') && $fechaEntrada<$fechaSalida)  { 
                    setReserva($codigoHotel1, $habitacion1, $fechaEntrada, $fechaSalida);
                }
            }
        }
        if(isset($codigoHotel2) && (isset($habitacion2))){
            $codigoHotelGuardado = $codigoHotel2;
            $codigoHabitacionGuardado = $habitacion2;
            if(isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida'])){
                $fechaEntrada = $_POST['fechaEntrada'];
                $fechaSalida = $_POST['fechaSalida'];
                if($fechaEntrada<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de entrada es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaSalida<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>$fechaSalida){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha de entrada.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>date('Y-m-d') && $fechaSalida>date('Y-m-d') && $fechaEntrada<$fechaSalida)  { 
                    setReserva($codigoHotel2, $habitacion2, $fechaEntrada, $fechaSalida);
                }
            }
        }
        if(isset($codigoHotel3) && (isset($habitacion3))){
            $codigoHotelGuardado = $codigoHotel3;
            $codigoHabitacionGuardado = $habitacion3;
            if(isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida'])){
                $fechaEntrada = $_POST['fechaEntrada'];
                $fechaSalida = $_POST['fechaSalida'];
                if($fechaEntrada<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de entrada es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaSalida<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>$fechaSalida){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha de entrada.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>date('Y-m-d') && $fechaSalida>date('Y-m-d') && $fechaEntrada<$fechaSalida)  { 
                    setReserva($codigoHotel3, $habitacion3, $fechaEntrada, $fechaSalida);
                }
            }
        }
        if(isset($codigoHotel4) && (isset($habitacion4))){
            $codigoHotelGuardado = $codigoHotel4;
            $codigoHabitacionGuardado = $habitacion4;
            if(isset($_POST['fechaEntrada']) && isset($_POST['fechaSalida'])){
                $fechaEntrada = $_POST['fechaEntrada'];
                $fechaSalida = $_POST['fechaSalida'];
                if($fechaEntrada<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de entrada es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaSalida<date('Y-m-d')){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha actual.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>$fechaSalida){
                    echo '<script language="javascript">alert("La fecha de salida es menor que la fecha de entrada.");</script>';
                    header( "Refresh:0; url=../index.php?categoria=inscripcion&p=2", false, 303);
                }
                if($fechaEntrada>date('Y-m-d') && $fechaSalida>date('Y-m-d') && $fechaEntrada<$fechaSalida)  { 
                    setReserva($codigoHotel4, $habitacion4, $fechaEntrada, $fechaSalida);
                }        
            }
        }   
}

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $centro = $_POST['centro'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    $tipo_cuota = $_POST['tipo_cuota'];

    if(isset($_POST['correo']) || isset($_POST['correo_conf'])){
        if($_POST['correo']!=$_POST['correo_conf']){
                echo '<script language="javascript">alert("Las direcciones de correo tienen que ser iguales");</script>';
                header( "Refresh:0; url=index.php?categoria=inscripcion&p=0", false, 303);
        }   
    }

    if(isset($_POST['pass']) || isset($_POST['pass_conf'])){
        if($_POST['pass']!=$_POST['pass_conf']){
            echo '<script language="javascript">alert("Las contraseñas no coinciden");</script>';
            header( "Refresh:0; url=index.php?categoria=inscripcion&p=0", false, 303);
        }
    }


    
    include_once('../dbConnect.php');

    $conn=dbConnect();
    
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

    //Primero voy a comprobar que el correo que se quiere inscribir no tiene ya una inscripción previa.

    $queryConfirmacion = "SELECT * FROM ceiie2015.inscripcion WHERE Usuario_correo=".$correo;
    $resultadoConfirmacion = $conn ->query($queryConfirmacion);

    $queryConfirmacion2 = "SELECT * FROM ceiie2015.usuario WHERE correo=".$correo;
    $resultadoConfirmacion2 = $conn->query($queryConfirmacion2);

    if($resultadoConfirmacion==true){
        echo '<script language="javascript">alert("Ya existe una inscripción con este usuario.");</script>';
        header( "Refresh:1; url=../index.php?categoria=inscripcion&p=0", false, 303);
    }
    if($resultadoConfirmacion2==true){
        echo '<script language="javascript">alert("Ya existe un usuario con ese correo electrónico.");</script>';
        header( "Refresh:1; url=../index.php?categoria=inscripcion&p=0", false, 303);
    }
    
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
        $actMarcadas = array();
        foreach ($rowsActvidades as $actividad) 
        {
            if (in_array($actividad['idActividad'], $actividades_marcadas)) 
            {
                $precio+=$actividad['precio'];//Acumulamos precio
                array_push($actMarcadas, $actividad['nombreActividad']);
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
        //-------------------ENVIO DE CORREO-----------
        //Obtenemos el nombre del hotel por medio de la API
        $hotel = getHotel($codigoHotelGuardado);
        $nombreHotel = $hotel['nombreHotel'];;
        
        //Creamos el correo y lo enviamos
        require_once "Mail.php";
        $from = '<websibw@gmail.com>';
        $to = $correo;
        $subject = '[Inscripción CEIIE 2015]';
        $headers = array('From' => $from,'To' => $to,'Subject' => $subject);
        $body='';

        //Comprobamos si hay actividades y hoteles, se generarán diferentes tipos de body en el correo enviado según se hayan elegido los datos
        if(count($actMarcadas)==0 && $codigoHotelGuardado==0){ //NO HAY DE NINGUNO DE LOS DOS, SOLO INSCRIPCION
            $body = "Muchas gracias ".$nombre." ".$apellidos.". Se ha inscrito correctamente en el congreso CEIIE2015.\n
            Su ID de inscripción es: ".$idInscripcion."\nEl precio total de su inscripción es de: ".$precio." euros.\n";
        }
        if(count($actMarcadas)==0 && $codigoHotelGuardado!=0){ //No hay actividades pero si hay hotel
            $body = "Muchas gracias ".$nombre." ".$apellidos.". Se ha inscrito correctamente en el congreso CEIIE2015.\n
            Su ID de inscripción es: ".$idInscripcion."\nEl precio total de su inscripción es de: ".$precio." euros.\n 
            Además ha realizado una reserva en el hotel".$nombreHotel;
        }
        if(count($actMarcadas)>0 && $codigoHotelGuardado==0){ //Hay actividades pero no hay hotel
            $body = "Muchas gracias ".$nombre." ".$apellidos.". Se ha inscrito correctamente en el congreso CEIIE2015.\n
            Su ID de inscripción es: ".$idInscripcion."\nEl precio total de su inscripción es de: ".$precio." euros.\n 
            Además de la inscripción ha solicitado una serie de actividades extra:\n";
            foreach ($actMarcadas as $value) {
                $body .= '- '.$value."\n";
            }
        }
        if(count($actMarcadas)>0 && $codigoHotelGuardado!=0){ //Hay actividades y hay hotel
            $body = "Muchas gracias ".$nombre." ".$apellidos.". Se ha inscrito correctamente en el congreso CEIIE2015.\n
            Su ID de inscripción es: ".$idInscripcion."\nEl precio total de su inscripción es de: ".$precio." euros.\n 
            Además de la inscripción ha solicitado una serie de actividades extra:\n";  
            foreach ($actMarcadas as $value) {
                $body .= '- '.$value."\n";
            }
            $body .= "Además ha realizado una reserva en el hotel".$nombreHotel;
        }
        $smtp = Mail::factory('smtp', array('host' => 'ssl://smtp.gmail.com','port' => '465','auth' => true,'username' => 'websibw@gmail.com','password' => 'websibw1234'));
        
        $mail = $smtp->send($to, $headers, $body);
        if (PEAR::isError($mail)) {
                echo('<p class="parrafo">' . $mail->getMessage() . '</p>');
        } 
        else 
        {
            echo '<script language="javascript">alert("¡Muchas Gracias! Se ha inscrito correctamente en el congreso.");</script>';
            session_start();
            $_SESSION["nombre_perfil"]=$nombre;
            $_SESSION["sesion_iniciada"]=true;
            header( "Refresh:0; url=../index.php?categoria=index", true, 303);
        }
        //---------------------------------------------
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