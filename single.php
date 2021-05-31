<?php

require 'admin/config.php';
require 'functions.php';

//Cargar de la base de datos = conectarnos
$conexion = conexion($bd_config);
$id_articulo = id_articulo($_GET['id']);  //guardamos el id

if (!$conexion) {
    header('Location: error.php');
}

//si esta vacio este articulo enviamos al index.php
if (empty($id_articulo)) {
    header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post) {  //si no hay post mandamos al index
    header('Location: index.php');
}

$post = $post[0];


require 'views/single.view.php';

?>