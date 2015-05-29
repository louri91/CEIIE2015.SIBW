var i = 0;
var path = new Array();
 
var j=0;
var granada = new Array();

granada[0] = "img/Alhambra/alhambra_dia.jpg";
granada[1] = "img/Alhambra/alhambra_noche.png";
granada[2] = "img/Alhambra/alhambra_leones.jpg";
granada[3] = "img/Catedral/catedral1.jpg";
granada[4] = "img/Catedral/catedral2.JPG";
granada[5] = "img/Catedral/catedral3.jpg";
granada[6] = "img/CarmenMartires/carmenmartires4.jpg";
granada[7] = "img/CarmenMartires/carmenmartires2.jpg";
granada[8] = "img/CarmenMartires/carmenmartires3.jpg";
granada[9] = "img/SierraNevada/sierra1.JPG";
granada[10] = "img/SierraNevada/sierra2.JPG";
granada[11] = "img/SierraNevada/sierra3.JPG";

path[0] = "img/colaboradores/bmn.jpeg";
path[1] = "img/colaboradores/santander.png";
path[2] = "img/colaboradores/telefonica.jpg";

function validarContacto(formulario) {
    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

	if( formulario.nombre.value.length == 0 || formulario.apellidos.value.length == 0 || formulario.email.value.length == 0 || formulario.consulta.value.length == 0)
	{
        alert("Existen campos vacios. Por favor completa todos los campos del formulario.");
		if(formulario.nombre.value.length == 0)
			formulario.nombre.focus() ;
		else if(formulario.apellidos.value.length == 0)
			formulario.apellidos.focus();
		else if(formulario.email.value.length == 0)
			formulario.email.focus();
		else if(formulario.consulta.value.length == 0)
			formulario.consulta.focus();
		if ( !expr.test(formulario.email.value) )
   		{
        alert("Error: La dirección de correo " + formulario.email.value + " es incorrecta.");
        formulario.email.focus() ;
    	}
    }
    else{
    	alert("¡Muchas Gracias! Se ha recibido correctamente su petición");
    }
	

}

function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1) i++; else i = 0;
   setTimeout("swapImage()",1500);
}

function swapImages()
{
	document.granadaSlider.src = granada[j];
	if(j<granada.length-1) j++;else j=0;
	setTimeout("swapImages()",2500);
}

function sliders()
{
	swapImage();
	swapImages();
}

function guardarValoresUsuario(formularioInscripcion){

	if(formularioInscripcion.correo.value != formularioInscripcion.correo_conf.value)
	{
		alert("Los correos electrónicos tienen que ser iguales");
		return false;
	}
	else if(formularioInscripcion.pass.value != formularioInscripcion.pass_conf.value)
	{
		alert("Las contraseñas no coinciden");
		return false;
	}else{
		return true;
	}
}



function guardarValoresActividades(formularioActividades){

	if(formularioInscripcion.correo.value != formularioInscripcion.correo_conf.value)
	{
		alert("Los correos electrónicos tienen que ser el mismo");
		return false;
	}
	else if(formularioInscripcion.pass.value != formularioInscripcion.pass_conf.value)
	{
		alert("Las contraseñas no coinciden");
		return false;
	}
	else
	{
		document.cookie = 'Usuario' + "=" + formularioInscripcion.nombre.value + ';' + formularioInscripcion.apellidos.value + ';' + formularioInscripcion.centro.value + ';' + formularioInscripcion.direccion.value + ';' + formularioInscripcion.telefono.value + ';' + formularioInscripcion.correo.value + ';' + formularioInscripcion.pass.value + ';' + formularioInscripcion.tipo_cuota + ";"
		alert("Datos almacenados correctamente");
		return true;
	}
	return false;
}

function guardarValoresAlojamiento(formularioAlojamiento){

	if(formularioInscripcion.correo.value != formularioInscripcion.correo_conf.value)
	{
		alert("Los correos electrónicos tienen que ser el mismo");
		return false;
	}
	else if(formularioInscripcion.pass.value != formularioInscripcion.pass_conf.value)
	{
		alert("Las contraseñas no coinciden");
		return false;
	}
	else
	{
		document.cookie = 'Usuario' + "=" + formularioInscripcion.nombre.value + ';' + formularioInscripcion.apellidos.value + ';' + formularioInscripcion.centro.value + ';' + formularioInscripcion.direccion.value + ';' + formularioInscripcion.telefono.value + ';' + formularioInscripcion.correo.value + ';' + formularioInscripcion.pass.value + ';' + formularioInscripcion.tipo_cuota + ";"
		alert("Datos almacenados correctamente");
		return true;
	}
	return false;
}



window.onload=sliders;

