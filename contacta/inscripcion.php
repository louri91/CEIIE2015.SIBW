<?php 
     //Consutlamos las cuotas de la base de datos y rellenamos la lista
    include_once('dbConnect.php');
    $conn=dbConnect();
    $queryCuotas = "SELECT * FROM ceiie2015.cuota";
    $resultadoCuotas = $conn->query($queryCuotas);
    $rowsCuotas = $resultadoCuotas->fetchAll();
    
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
?>
<style>
    input[type=checkbox]{
    display:inline;
    }
</style>
    <ol class="breadcrumb">
      <li class="active"><a href="index.php?categoria=inscripcion&p=0">Datos Personales</a></li>
      <li><a href="index.php?categoria=inscripcion&p=1">Actividades</a></li>
      <li><a href="index.php?categoria=inscripcion&p=2">Alojamiento</a></li>
    </ol>
      <fieldset class="inscripcion">
         <legend><h2>Datos de inscripción</h2></legend>
         <form id="formularioInscripcion" action="index.php?categoria=inscripcion&p=1" method="post">
         <select class="form-control" name="tipo_cuota">
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
         <input type="text" name="nombre" class="form-control" placeholder="Nombre" value='<?php if(isset($nombre)){echo $nombre;}?>' required>
         <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" value='<?php if(isset($apellidos)){echo $apellidos;}?>' required>
         <input type="text" name="centro" class="form-control" placeholder="Centro de Trabajo" value='<?php if(isset($centro)){echo $centro;}?>' required>
         <input type="text" name="direccion" class="form-control" placeholder="Direccion" value='<?php if(isset($direccion)){echo $direccion;}?>' required>
         <input type="text" name="telefono" class="form-control" placeholder="Teléfono" value='<?php if(isset($telefono)){echo $telefono;}?>' required>
         <input type="email" name="correo" class="form-control" placeholder="Dirección de correo" value='<?php if(isset($correo)){echo $correo;}?>' required>
         <input type="email" name="correo_conf" class="form-control" placeholder="Confirmar dirección de correo" required>
         <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
         <input type="password" name="pass_conf" class="form-control" placeholder="Confirmar contraseña" required>
         <br>
         <div style="text-align:right">
            <button type="submit" class="btn btn-primary">Siguiente</button>
         </div>
         </form>
      </fieldset>