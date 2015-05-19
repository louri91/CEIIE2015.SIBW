<?php
function dbConnect (){
    $conn = null;
    $host = 'eu-cdbr-azure-west-c.cloudapp.net';
    $db =   'ceiie2015';
    $user = 'b0b003d67f6fa3';
    $pwd =  '0ec723e4';
    try {
        $conn = new PDO('mysql:host='.$host.';dbname='.$db, $user, $pwd);
    }
    catch (PDOException $e) {
        echo '<p>No se ha podido realizar la conexión :(</p>';
        exit;
    }
    return $conn;
 }
 
 ?>