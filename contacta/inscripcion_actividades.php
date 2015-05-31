<?php 
        include_once('dbConnect.php');
        $conn=dbConnect();
    if (isset($_POST['nombre']) && isset($_POST['apellidos']) && isset($_POST['centro']) && isset($_POST['telefono']) && isset($_POST['correo']) && isset($_POST['pass']) && isset($_POST['tipo_cuota'])) 
    {   
        $nombre = $_POST['nombre'];//
        $apellidos = $_POST['apellidos'];//
        $centro = $_POST['centro'];
        $direccion = $_POST['direccion'];
        $telefono = $_POST['telefono'];//
        $correo = $_POST['correo'];//
        $pass = $_POST['pass'];//
        $tipo_cuota = $_POST['tipo_cuota'];
        $datosUsuario = array($nombre, $apellidos, $direccion, $centro, $telefono, $correo, $pass, $tipo_cuota);
        setcookie('usuario', serialize($datosUsuario), time()+3600, "/");
    }
    else if(isset($_COOKIE['usuario'])){
        $cookieUsuario = $_COOKIE['usuario'];
        $datos = unserialize($cookieUsuario);
        
    }
    else{
        echo '<script language="javascript">alert("Los datos de usuario son obligatorios");</script>';
        header( "Refresh:0; url=index.php?categoria=inscripcion&p=0", false, 303);
    }

    

    if(isset($_COOKIE['usuario_actividades'])){
        $cookieUsuario = $_COOKIE['usuario_actividades'];
        $datos = unserialize($cookieUsuario);
    }

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

?>

<style>
    input[type=checkbox]
    {
    display:inline;
    }
</style>
   <ol class="breadcrumb">
      <li><a href="index.php?categoria=inscripcion&p=0">Datos Personales</a></li>
      <li class="active"><a href="index.php?categoria=inscripcion&p=1">Actividades</a></li>
      <li><a href="index.php?categoria=inscripcion&p=2">Alojamiento</a></li>
    </ol>
    <fieldset class="inscripcion">
                 <h2>Actividades incluidas:</h2>
                 <form id="formularioActividades" action="index.php?categoria=inscripcion&p=2" method="post">
             <?php
                 if(isset($tipo_cuota)) {
                    $queryActividadesIncluidas = "SELECT * FROM ceiie2015.Actividad_has_cuota WHERE Cuota_idCuota='".$tipo_cuota."'";
                    $resultadosActCuotas = $conn -> query($queryActividadesIncluidas);
                    $rowsActCuotas = $resultadosActCuotas->fetchAll();
                    foreach ($rowsActCuotas as $actividadIncluida) {
                        $actividad_cuota = "SELECT * FROM ceiie2015.Actividad WHERE idActividad='".$actividadIncluida['Actividad_idActividad']."'";
                        $res = $conn->query($actividad_cuota);
                        $rowsAct = $res->fetch();
                        echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name=".$rowsAct['idActividad']." value=".$rowsAct['idActividad']." checked disabled />".$rowsAct['nombreActividad']."<br>";
                    }
                }
             ?>
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
                            echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name='$idAct' value='$idAct' checked/>".$nombreAct." (".$precio."€)<br>";
                        }else{
                        echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name='$idAct' value='$idAct'/>".$nombreAct." (".$precio."€)<br>";
                        }
                    }
                }else{
                    $idAct = $actividad['idActividad'];
                    $nombreAct = $actividad['nombreActividad'];
                    $precio = $actividad['precio'];
                    if(isset($datos) && in_array($idAct, $datos)){
                            echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name='$idAct' value='$idAct' checked/>".$nombreAct." (".$precio."€)<br>";
                        }else{
                        echo "<input type='checkbox' class='form-control' class='actividades' style='width:6%;height:3%;' name='$idAct' value='$idAct'/>".$nombreAct." (".$precio."€)<br>";
                    }
                }

            }
            ?>
            <div style="text-align:right">
            <button type="submit" class="btn btn-primary">Siguiente</button>
            </div>
    </fieldset>
         