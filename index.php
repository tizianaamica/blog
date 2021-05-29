<?php

require 'admin/config.php';
require 'functions.php';

//Conexion a la BD en variable
$conexion = conexion($bd_config);
if (!$conexion) { //Si no hay conexion, va al archivo
    header('Location: error.php');
    //echo "Error";
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);
//print_r($posts);

if(!$posts){
   header('Location: error.php');
}

require 'views/index.view.php';

?>