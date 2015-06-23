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

function enviar(){
	
	var xhr;
	if (window.XMLHttpRequest) 
        xhr = new XMLHttpRequest();
    else if (window.ActiveXObject) 
        xhr = new ActiveXObject("Msxml2.XMLHTTP");
    else 
        throw new Error("Ajax is not supported by your browser");
		
	xhr.open('POST', 'http://localhost/SIBW/v6.0/index.php', true); 
	
	var nombre = document.getElementById("nombre").value;
	var apellidos = document.getElementById("apellidos").value;
	var centro = document.getElementById("centro").value;
	var direccion = document.getElementById("direccion").value;
	var telefono = document.getElementById("telefono").value;
	var correo = document.getElementById("correo").value;
	var correo_conf = document.getElementById("correo_conf").value;
	var pass = document.getElementById("pass").value;
	var pass_conf = document.getElementById("pass_conf").value;
	var tipo_cuota = document.getElementById("tipo_cuota").value;
	var params = "categoria=inscripcion&p=1&nombre="+nombre+"&apellidos="+apellidos+"&centro="+centro+"&direccion="+direccion+"&telefono="+telefono+"&correo="+correo+"&correo_conf="+correo_conf+"&pass="+pass+"&pass_conf="+pass_conf+"&tipo_cuota="+tipo_cuota;
	

	xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhr.setRequestHeader("Content-length", params.length);
	xhr.setRequestHeader("Connection", "close");
	
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
            if (xhr.status <= 303){ 
                document.getElementById('ceiie').innerHTML = xhr.responseText;
			}
        }
    };
	xhr.send(params);
}



window.onload=sliders;

