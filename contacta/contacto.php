   <fieldset class="inscripcion">
         <legend><h2>Contacta con nosotros</h2></legend>
         <form id="formularioContacto" action="contacta/envio_correo.php" method="post">
         <input type="text" name="nombre" class="form-control" placeholder="Nombre" style="width:60%" required>
         <input type="text" name="apellidos" class="form-control" placeholder="Apellidos" style="width:90%" required>
         <input type="text" name="email" id="email" class="form-control" placeholder="Dirección de correo" style="width:100%" required>
		    <input type="text" name="asunto" id="asunto" class="form-control" placeholder="Asunto" style="width:100%" required>
         <textarea  rows="3" name="consulta" class="form-control" style="height:10%" required>Introduce tu consulta aquí...</textarea>
         <div style="text-align:center">
            <button type="submit" class="btn btn-primary" onClick="javascript:validarContacto(formularioContacto);">Enviar</button>
         </div>
         </form>
      </fieldset>