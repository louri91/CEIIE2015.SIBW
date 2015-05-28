<?php
    /*Comprobamos si se ha obtenido correo y pass por medio de un formulario
     *en el cas de que se reciba algun dato en ambos se realizar� la consulta.
     * En el caso de que existe el usuario que ha iniciado sesi�n, asignamos
     * las variables globales de nombre_perfil y sesion_iniciada.
     */
    if (isset($_POST['login_name']) && isset($_POST['login_pass'])) {	
		include_once('../dbConnect.php');
		$conn=dbConnect();
		$correo = $_POST['login_name'];
		$contrasena = $_POST['login_pass'];
		$queryLogin = "SELECT * FROM ceiie2015.usuario WHERE correo='".$correo."' AND pass='".$contrasena."'";
		$resultadoLogin = $conn->query($queryLogin);
                $rowsLogin = $resultadoLogin->fetch();

        if ($rowsLogin != false) {
            session_start();
            $_SESSION["id_usuario"]=$rowsLogin[0];
            $_SESSION["nombre_perfil"]=$rowsLogin[2];
            $_SESSION["sesion_iniciada"]=true;
            header('location: ../index.php?categoria=index');
        }
        else
        {
            header('location: ../index.php?categoria=login&error_sesion=true');
        }
    }
    else
    {
        header('location: ../index.php?categoria=login&error_sesion=true');
    }