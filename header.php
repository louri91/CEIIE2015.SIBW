<head>
<meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" http-equiv="content-type" content="width=device-width, initial-scale=1.0"/>
   <meta content="text/html; charset=utf-8" />
   <link rel="stylesheet" href="css/styles.css">
   <link rel="stylesheet" href="css/menuResponsive.css">
   <script src="js/javascript.js"></script>
   <script type="text/javascript" src="js/ajax.js"></script>
   <link rel="icon" href="img/favicon.ico" type="image/x-icon">
   <title>CEIIE 2015</title>
   <div id='header-login'>
       <?php 
       session_start();
       if(isset($_SESSION['sesion_iniciada']) && $_SESSION['sesion_iniciada']==true)
       {
           ?><font color="#fff"><?php echo "¡Hola ".$_SESSION['nombre_perfil']. "!"; ?><br>
               <a href="contacta/script_cerrar_sesion.php"><font color="#fff">Cerrar sesión</a>
               <?php
       }
       else
       {?>
    <a href="index.php?categoria=login"><font color="#fff">Login</a></font>
        <?php } ?>
   </div>
      <div id="header-titulo">CEIIE 2015<br>I Congreso de Estudiantes de Ingeniería Informática en España</div>
   <div id='header-contacto'>
   <b>Contacta:</b><br>
   ETSIIT<br>
   Teléfono: +34-958242802<br>
   Fax: +34-958242801<br>
   E-mail: <a href='mailto:congreso@etsiit.ugr.es'><font color="#fff">congreso@etsiit.ugr.es</a></font><br>
   </div><br>

   <img id="bg" src="img/cabecera.jpg" alt="background"/>
      <nav style="padding-top:2%">
      <label for="show-menu" class="show-menu">Menu</label>
      <ul id="menu">
      
      <li><a href="index.php?categoria=index">Inicio</a></li>
      <li><a href="index.php?categoria=horario">Horario</a></li>
      <li>
         <a href="index.php?categoria=actividades">Actividades ￬</a>
         <ul class="hidden">
            <li><font size=2><a href="index.php?categoria=actividades&id=1">Visitar la Alhambra</a></li></font>
            <li><font size=2><a href="index.php?categoria=actividades&id=2">Visitar Sierra Nevada</a></li></font>
            <li><font size=2><a href="index.php?categoria=actividades&id=3">Visitar la Catedral</a></font></li>
            <li><font size=2><a href="index.php?categoria=actividades&id=4">Carmen de los Mártires</a></font></li>
         </ul>
      </li>
      <li><a href="index.php?categoria=inscripcion">Inscripción</a></li>
		<li>
         <a href="index.php?categoria=ponencias">Ponencias ￬</a>   
         <ul class="hidden">
            <li><font size=2><a href="index.php?categoria=inso">Ingeniería del Software</a></li></font>
            <li><font size=2><a href="index.php?categoria=so">Sistemas Operativos</a></li></font>
            <li><font size=2><a href="index.php?categoria=ig">Informática Gráfica</a></li></font>
            <li><font size=2><a href="index.php?categoria=sc">Sistemas Complejos</a></li></font>
            <li><font size=2><a href="index.php?categoria=bd">Bases de Datos</a></li></font>
            <li><font size=2><a href="index.php?categoria=iu">Interfaces de Usuario</a></li></font>
            <li><font size=2><a href="index.php?categoria=co">Compiladores</a></li></font>
         </ul>
      </li>
      <li><a href="index.php?categoria=ciudad">La Ciudad</a></li>
      <li><a href="index.php?categoria=colabora">Colaboradores</a></li>
      <li><a href="index.php?categoria=llegar">Cómo llegar ￬</a>
      <ul class="hidden">
         <li><font size=2><a href="index.php?categoria=llegar&#autobus">Autobús</a></font></li>
         <li><font size=2><a href="index.php?categoria=llegar&#tren">Tren</a></font></li>
         <li><font size=2><a href="index.php?categoria=llegar&#avion">Avión</a></font></li>
      </ul>
      </li>
      <li><a href="index.php?categoria=contacta">Contacta</a></li>
   </ul>
   </nav>
</head>