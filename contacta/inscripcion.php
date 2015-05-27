      <?php include 'apiConnect.php'; 
      /*
      Incluimos la conexión a la API;
      */
            $hoteles = getHoteles();
      ?>
      <fieldset class="inscripcion">
         <legend><h2>Datos de inscripción</h2></legend>
         <select class="form-control" style="width:60%">
            <option>Profesional -> 50€</option>
            <option>Profesor -> 30€</option>
            <option>Alumno -> 15€</option>
         </select>
         <input type="text" class="form-control" placeholder="Nombre" style="width:60%" required>
         <input type="text" class="form-control" placeholder="Apellidos" style="width:80%" required>
         <input type="text" class="form-control" placeholder="Centro de Trabajo" style="width:80%" required>
         <input type="text" class="form-control" placeholder="Teléfono" style="width:60%" required>
         <input type="email" class="form-control" placeholder="Dirección de correo" style="width:100%" required>
         <input type="email" class="form-control" placeholder="Confirmar dirección de correo" style="width:100%" required>
         <input type="text" class="form-control" placeholder="Contraseña" style="width:80%" required>
         <input type="text" class="form-control" placeholder="Actividades" style="width:80%">
         <select class="form-control" style="width:80%">
            <?php foreach ($hoteles as $hotel => $value) {
                  echo '<option>Hotel: ';
                  echo $value['nombreHotel'];
                  //echo $hotel;
                  ' </option>';
            }?>
           
         </select>

         <div style="text-align:center">
            <button type="button" class="btn btn-primary" onClick="javascript:validarContacto(formularioContacto);">Inscribir</button>
         </div>
      </fieldset>