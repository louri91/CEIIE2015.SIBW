      <fieldset class="inscripcion" style="margin:auto;margin-top:5%;float:left">
         <legend>
            <h2>Recordar contraseña</h2>
         </legend>
		 <form id="formularioLogin" action="contacta/script_recordarpass.php" method="post">
         <input type="text" name="login_name" class="form-control" placeholder="Dirección de correo" style="width:90%" required>
         <div style="text-align:center">
         <button type="submit" class="btn btn-primary">Recordar</button></div>
		 </form>
      </fieldset>


      <fieldset class="inscripcion" style="margin:auto;margin-top:5%">
         <legend>
            <h2>Cambiar contraseña</h2>
         </legend>
		 <form id="formularioLogin" action="contacta/script_cambiarpass.php" method="post">
         <input type="text" name="cambiar_name" class="form-control" placeholder="Nombre de Usuario" style="width:60%" required>
         <input type="password" name="cambiar_oldpass" class="form-control" placeholder="Contraseña actual" style="width:100%" required>
         <input type="password" name="cambiar_newpass" class="form-control" placeholder="Nueva contraseña" style="width:100%" required>
         <input type="password" name="cambiar_newpass_rep" class="form-control" placeholder="Repita la nueva contraseña" style="width:100%" required>
         <div style="text-align:center;margin-bottom: 10%">
         <button type="submit" class="btn btn-primary">Cambiar</button></div>
		 </form>
      </fieldset>

