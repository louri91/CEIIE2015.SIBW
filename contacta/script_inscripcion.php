<?php
    /*Comprobamos si se ha obtenido correo y pass por medio de un formulario
     *en el cas de que se reciba algun dato en ambos se realizar� la consulta.
     * En el caso de que existe el usuario que ha iniciado sesi�n, asignamos
     * las variables globales de nombre_perfil y sesion_iniciada.
     */
    if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['centro']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['pass']) && isset($_POST['tipo_cuota'])) 
    {	
        include_once('../dbConnect.php');
        $conn=dbConnect();
        $nombre = $_POST['nombre'];//
        $apellidos = $_POST['apellidos'];//
        //$centro = $_POST['centro'];
        $telefono = $_POST['telefono'];//
        $correo = $_POST['correo'];//
        $pass = $_POST['pass'];//
        $tipo_cuota = $_POST['tipo_cuota'];
        $queryUsuario = "INSERT INTO usuario (correo,pass,nombre,apellidos,direccion) values ('".$correo."','".$pass."','".$nombre."','".$apellidos."','".$telefono."')";
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
            $actividades_marcadas = array();
            foreach ($rowsActvidades as $actividad) 
            {
                    if (isset($_POST[$actividad['idActividad']])) 
                    {
                        $precio+=$actividad['precio'];//Acumulamos precio
                        array_push($actividades_marcadas, $actividad['idActividad']);
                    }  
            }
            $queryInsertInscripcion = "INSERT INTO inscripcion (precioFinal,Cuota_idCuota,Usuario_correo) values ('".$precio."','".$tipo_cuota."','".$correo."')";
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
        echo "Se ha inscrito correctamente en el congreso.";
        header( "Refresh:3; url=../index.php?categoria=index", true, 303);
    }
    else
    {
        header('location: ../index.php?categoria=inscripcion&error_sesion=true');
    }