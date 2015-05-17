<?php
if(isset($_POST['email']) && isset($_POST['nombre']) && isset($_POST['consulta']))
{
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$consulta = $_POST['consulta'];
	$asunto = $_POST['asunto'];
	
	require_once "Mail.php";
	
	$from = '<websibw@gmail.com>';
	$to = $_POST['email'];
	$me = $from;
	$subject = '[Mensaje web]'.$asunto;
	$body = $consulta;

	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
	
	$body = $consulta;

	$me_headers = array(
		'From' => $from,
		'To' => $me,
		'Subject' => $subject
	);

	$smtp = Mail::factory('smtp', array(
			'host' => 'ssl://smtp.gmail.com',
			'port' => '465',
			'auth' => true,
			'username' => 'websibw@gmail.com',
			'password' => 'websibw1234'
		));

	$mail = $smtp->send($to, $headers, $body);
	$mail2 = $smtp->send($me, $me_headers, $body);
	if (PEAR::isError($mail)) {
		echo('<p>' . $mail->getMessage() . '</p>');
	} else {
		header('Location: ../index.php?categoria=contacta');
	}
}
?>