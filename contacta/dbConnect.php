<?php
function dbConnect (){
    $conn = null;
    $host = 'localhost';
    $db =   'ceiie2015';
    $user = 'root';
    $pwd =  'freija';
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