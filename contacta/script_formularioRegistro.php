<?php
    /*Comprobamos si se ha obtenido correo y pass por medio de un formulario
     *en el cas de que se reciba algun dato en ambos se realizar� la consulta.
     * En el caso de que existe el usuario que ha iniciado sesi�n, asignamos
     * las variables globales de nombre_perfil y sesion_iniciada.
     */
    if (isset($_POST['reg_name']) && isset($_POST['reg_subname']) && isset($_POST['reg_mail']) && isset($_POST['reg_pass']) && isset($_POST['reg_tel'])) {	
		include_once('../dbConnect.php');
		$conn=dbConnect();
		$nombre = $_POST['reg_name'];
		$apellidos = $_POST['reg_subname'];
                $mail = $_POST['reg_mail'];
                $pass = $_POST['reg_pass'];
                $telefono = $_POST['reg_tel'];
                
		$queryLogin = "INSERT INTO usuario (correo,pass,nombre,apellidos,direccion) values ('".$mail."','".$pass."','".$nombre."','".$apellidos."','".$telefono."')";
		$resultadoRegistro = $conn->query($queryLogin);
        if ($resultadoRegistro != false) {
            header('location: ../index.php?categoria=index');
        }
        else
        {
            header('location: ../index.php?categoria=login&error_registro=true');
        }
    }
    else
    {
        header('location: ../index.php?categoria=login&error_registro=true');
    }