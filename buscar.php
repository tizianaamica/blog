<?php 

require 'admin/config.php';
require 'functions.php';

//Conexion a la BD en variable
$conexion = conexion($bd_config);
if (!$conexion) { //Si no hay conexion, va al archivo
    header('Location: error.php');
    //echo "Error";
}

//si el request es igual a get y no esta vacio el valor de busqueda
if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) {
    #primero limpiamos los datos de la busqueda para evitar la inyeccion de codigo
    $busqueda = limpiarDatos($_GET['busqueda']);

    #buscamos en la BD  
    //seleccionatos todos los articulos donde  el titulo sea COMO=LIKE lo que recibe o similar a :busqueda
    $statement = $conexion->prepare(
        'SELECT * FROM articulos WHERE titulo LIKE :busqueda or texto LIKE :busqueda'
    );
    //para poder buscar nos busca los articulos/texto donde empiece o finalice (%) 
    $statement->execute(array(':busqueda' => "%$busqueda%"));
    $resultados = $statement->fetchAll();  //traemos los datos del arreglo

    //si esta vacia = no hay resultados
    if (empty($resultados)) {
        $titulo = 'No se encontraron articulos con el resultado: ' .$busqueda;
    }else{
        $titulo = 'Resultados de la busqueda: ' .$busqueda;
    }
}else{ //si no se cumple la condicion de enviar los datos
    header('Location: ' . RUTA . '/index.php');
}

require 'views/buscar.view.php';

?>