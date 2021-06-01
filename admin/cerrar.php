<?php session_start();

session_destroy();
//por precaucion, reiniciamos el arreglo
$_SESSION = array();

//enviamos al index
header('Location: ../');
die();

?>