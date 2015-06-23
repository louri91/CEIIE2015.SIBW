<?php
if(isset($_POST['login_name']))
{

	require_once "Mail.php";
	
	$from = '<websibw@gmail.com>';
	$to = $_POST['login_name'];
	$me = $from;
	$subject = '[CEIIE 2015 Recordatorio de contraseña]';

	$headers = array(
		'From' => $from,
		'To' => $to,
		'Subject' => $subject
	);
	
        include_once('../dbConnect.php');
        $conn=dbConnect();
        $queryLogin = "SELECT pass FROM ceiie2015.usuario WHERE correo='".$to."'";
        $resultadoLogin = $conn->query($queryLogin);
        $rowsLogin = $resultadoLogin->fetch();
        if ($rowsLogin != false) 
        {
            $body = "Su contraseña es ".$rowsLogin[0];


            $smtp = Mail::factory('smtp', array(
                            'host' => 'ssl://smtp.gmail.com',
                            'port' => '465',
                            'auth' => true,
                            'username' => 'websibw@gmail.com',
                            'password' => 'websibw1234'
                    ));

            $mail = $smtp->send($to, $headers, $body);
            if (PEAR::isError($mail)) {
                    echo('<p>' . $mail->getMessage() . '</p>');
            } else {
                    header('Location: ../index.php?categoria=contacta');
            }
        }
        else
        {
            echo "No se encuentra esa dirección. Compruebe que está bien escrita.";
            header( "Refresh:5; url=../index.php?categoria=recordar", true, 303);
        }
}
?>