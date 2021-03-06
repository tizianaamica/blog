<?php

//Una funcion que me sirva para la bd
function conexion($bd_config)
{
    try {                                         //ponemos el arreglo para que se actualice y sea dinamico
        $conexion = new PDO('mysql:host=localhost;dbname=' . $bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        return $conexion;
    } catch (PDOException $e) {
        return false;
    }
}

//Limpiar datos
function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

function pagina_actual()
{ //p = pagina
    //si GET esta seteada entonces obtenemos el valor, de otra forma retorna 1
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

//post por pagina y conexion
function obtener_post($post_por_pagina, $conexion)
{
    //si la pagina_actual es mayor a 1 entonces, pagina_actual multiplicara por post_por_pagina - post_por_pagina, de otra forma la variable sera 0                                 
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    //Trae los articulos desde donde y cuantos OJO! SQL_CALC_FOUND_ROWS = para saber cuantos art tenemos en la BD
    $sentencia = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio, $post_por_pagina");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function numero_paginas($post_por_pagina, $conexion){
    //numero filas (de los articulos que devulve la consulta)
    $total_post = $conexion->prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute(); //ejecutar la sentencia SQL
    $total_post = $total_post->fetch()['total']; //fetch devuelve arreglo y quiero ir a total

    //la funcion ceil redondea hacia arriba 
    $numero_paginas  = ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}

function id_articulo($id)
{
    return (int)limpiarDatos($id);
}

//
function obtener_post_por_id($conexion, $id){ //resultado de una query 
    $resultado = $conexion->query("SELECT * FROM articulos  WHERE id= $id LIMIT 1");
    $resultado = $resultado->fetchAll();
    //si hay resultado, lo devolvemos sino falso
    return ($resultado) ? $resultado : false;
}

function fecha($fecha){
    $timestamp = strtotime($fecha);
    $meses =  ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) -1;  //Lo traducimos
    $year = date('Y', $timestamp);

    $fecha = "$dia de " . $meses[$mes] ." del $year";
    return $fecha;
}

function comprobarSession(){
    //si la session no esta seteada redirigimos a RUTA
    if (!isset($_SESSION['admin'])) {   
        header('Location: ' . RUTA);
    }
}

?>