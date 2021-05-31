<?php session_start();

//OJO  llamar archivo de configuracion sino se hace no cargan los estilos css
require 'admin/config.php';
require 'functions.php';

//si ya se enviaron los datos 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //guardamos los datos que se ingresaron
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);

    //trabajamos con las variables
    //si los datos son los mismos del admin crea la sesion
    if ($usuario == $blog_admin['usuario'] && $password == $blog_admin['password']) {
        $_SESSION['admin'] = $blog_admin['usuario'];
        //si inicio sesion envia a admin
        header('Location: ' . RUTA . '/admin');
    }
}

require 'views/login.view.php';



?>