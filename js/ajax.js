function objetoAjax () { 
     var obj; //variable que recogerá el objeto
	     if (window.XMLHttpRequest) { //código para mayoría de navegadores
	        obj=new XMLHttpRequest();
	     }
	     else { //para IE 5 y IE 6
	        obj=new ActiveXObject(Microsoft.XMLHTTP);
	   	}
        return obj; //devolvemos objeto
     }

function MostrarConsultaNombre(){
	divResultado = document.getElementById('resultado_busqueda');
	nombre = document.getElementById('nombre').value;
	
	ajax=objetoAjax();
	ajax.open("GET", "admin/scriptBusquedaCongresistas.php?nombre="+nombre);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}

function MostrarConsultaActividad(){
	divResultado = document.getElementById('resultado_busquedacuota');
	cuota = document.getElementById('tipo_cuota').value;
	
	ajax=objetoAjax();
	ajax.open("GET", "contacta/script_consultacuota.php?tipo_cuota="+cuota);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divResultado.innerHTML = ajax.responseText;
		}
	}
	ajax.send(null);
}

function cambiarTotal(){
	var tipo_cuota = document.getElementById('tipo_cuota').value;
	var hab = [];
	var habitacion = document.getElementsByName('habitacion[]');
	var actividadSeleccionada = [];
	var actividades = document.getElementsByName('actividad[]');
	var params = "tipo_cuota="+tipo_cuota;
	var contador = 0;
	for (var j=0;j<habitacion.length; j++) {
		if (habitacion[j].checked) {
			hab.push(habitacion[j].value);
			contador++;
			if(contador==1){
				params = params + "&habitacion="+habitacion[j].value;
			}
		}
	}
	
	
	for (var i=0;i<actividades.length; i++) {
		if (actividades[i].checked) {
			actividadSeleccionada.push(actividades[i].value);
			if(i==0){
				params = params + "&idAct0="+actividades[i].value;
			}else{
				params = params+"&idAct"+i+"="+actividades[i].value;
			}	
		}
	}
	
	ajax=objetoAjax();
	ajax.open('POST', 'contacta/calcularTotalTarifa.php', true); 
	ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	ajax.setRequestHeader("Content-length", params.length);

	ajax.onreadystatechange = function () {
		if (ajax.readyState==4) {
			readyState = true;
			document.getElementById('totalInscripcion').innerHTML = ajax.responseText;
        }
    }
	ajax.send(params);
}