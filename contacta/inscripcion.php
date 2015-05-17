      <fieldset class="inscripcion">
         <legend><h2>Datos de inscripción</h2></legend>
         <select class="form-control" style="width:60%">
            <option>Profesional -> 50€</option>
            <option>Profesor -> 30€</option>
            <option>Alumno -> 15€</option>
         </select>
         <input type="text" class="form-control" placeholder="Nombre" style="width:60%" required>
         <input type="text" class="form-control" placeholder="Apellidos" style="width:80%" required>
         <input type="email" class="form-control" placeholder="Dirección de correo" style="width:100%" required>
         <input type="email" class="form-control" placeholder="Confirmar dirección de correo" style="width:100%" required>
         <div style="text-align:center">
            <button type="button" class="btn btn-primary" onClick="javascript:validarContacto(formularioContacto);">Inscribir</button>
         </div>
      </fieldset>