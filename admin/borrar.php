<?php  session_start();
//Aqui recopilamos y enviamos a la BD

require 'config.php';
require '../functions.php';

//tenemos que comprobar que la sesion este iniciada
comprobarSession();

$conexion = conexion($bd_config);
if (!$conexion) {
    header('Location: ../error.php');
} 

$id = limpiarDatos($_GET['id']);

if (!$id) {
    header('Location: ' . RUTA . '/admin');
}

$statement = $conexion->prepare('DELETE FROM articulos WHERE id = :id');
$statement->execute(array('id' => $id));

header('Location: ' . RUTA . '/admin');

?>