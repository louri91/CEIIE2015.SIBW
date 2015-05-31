<?php
function getHoteles(){
	$url = 'http://localhost/proyectoHoteles/hotel';
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);
	$hoteles = (array)$result;

	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($hoteles); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $result;
}

function getImagenes($codigoHotel){
	$url = 'http://localhost/proyectoHoteles/img/'.$codigoHotel;
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);
	$hoteles = (array)$result;

	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($hoteles); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $hoteles;
}

function getHabitaciones($codigoHotel){
	$url = 'http://localhost/proyectoHoteles/habitacion/'.$codigoHotel;
	$curl = curl_init($url);

	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);

	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($result); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $result;
}

function setReserva($codigoHotel, $numHabitacion){
	$url = 'http://localhost/proyectoHoteles/reserva';
	$curl = curl_init($url);
	$data = array('codigoHotel' => urlencode($codigoHotel), 'numHabitacion' => urlencode($numHabitacion));
	$fields_string = '';

	foreach ($data as $key => $value) {
		$fields_string .= $key.'='.$value.'&'; 
	}

	rtrim($fields_string, '&');

	curl_setopt($curl, CURLOPT_POST, count($data));
	curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

	$curl_response = curl_exec($curl);

	if ($curl_response === false) {
	    $info = curl_getinfo($curl);
	    curl_close($curl);
	    die('error occured during curl exec. Additioanl info: ' . var_export($info));
	}

	curl_close($curl);

	$result = json_decode($curl_response, true);

	if (isset($result->response->status) && $result->response->status == 'ERROR') {
	    die('error occured: ' . $result->response->errormessage);
	}

	//Esto nos devuelve un array, no un string, con lo cual no podemos mostrarlo con un echo
	//Hay que recorrer el array para mostrar todos los hoteles
	//print_r($result); -> Esto lo imprime por pantalla, para comprobar que funciona nuestra API
	return $result;
}


?>
