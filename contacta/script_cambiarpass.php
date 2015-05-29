<?php

if (isset($_POST['cambiar_name']) && isset($_POST['cambiar_oldpass']) && isset($_POST['cambiar_newpass'])) {	
		include_once('../dbConnect.php');
		$conn=dbConnect();
		$correo = $_POST['cambiar_name'];
		$contrasena = $_POST['cambiar_oldpass'];
                $nueva_pass = $_POST['cambiar_newpass'];
		$queryLogin = "SELECT * FROM ceiie2015.usuario WHERE correo='".$correo."' AND pass='".$contrasena."'";
		$resultadoLogin = $conn->query($queryLogin);
                $rowsLogin = $resultadoLogin->fetch();

        if ($rowsLogin != false) {
            $queryUsuario = "Update usuario set pass='".$nueva_pass."' where correo='".$correo."'";
            $resultadoRegistro = $conn->query($queryUsuario);
            if ($resultadoRegistro == true) 
            {
                echo "Contraseña cambiada correctamente.";
                header( "Refresh:5; url=../index.php?categoria=index", true, 303);
            }
            else
            {
                echo "La contraseña no ha podido ser cambiada.\n Compruebe que los datos de su usuario con correctos.";
                header( "Refresh:5; url=.../index.php?categoria=recordar", true, 303);
            }
        }
        else
        {
            echo "La contraseña no ha podido ser cambiada.\n Compruebe que los datos de su usuario con correctos.";
            header( "Refresh:5; url=.../index.php?categoria=recordar", true, 303);
        }
    }
    else
    {
        echo "La contraseña no ha podido ser cambiada.\n Compruebe que los datos de su usuario con correctos.";
        header( "Refresh:5; url=.../index.php?categoria=recordar", true, 303);
    }

