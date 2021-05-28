<?php 

//Una funcion que me sirva para la bd
function conexion($bd_config){
    try {
        $conexion = new PDO('mysql:host=localhost;dbname=blog_practica', 'root', '');
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

//Limpiar datos
function limpiarDatos($datos){
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

?>