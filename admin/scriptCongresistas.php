
 <link rel="stylesheet" href="css/horario.css">
 <div style="margin-bottom:3%">
 <fieldset class="inscripcion" style="margin:auto;margin-top:5%">
         <legend>
            <h2>Filtros de busqueda:</h2>
         </legend>
        <label> Nombre: </label><input type="text" id="nombre" name="nombre" class="form-control" onkeyup="MostrarConsultaNombre();">
 </fieldset>
 </div>
 <div id="resultado_busqueda">
</div>

 <script language="javascript">
window.onload = MostrarConsultaNombre();
</script>