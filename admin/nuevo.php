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

//comprobamos que se envien los datos
//si RQUEST_METHOD es igual a post significa que se han enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $thumb = $_FILES['thumb']['tmp_name'];

    //aqui guardamos la ruta del archivo cuando este finalizado
    #ejemplo ../imagenes/1.jpg
    $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];

    //con esta funcion estamos moviendo los archivos de la PC del usuario al SERVIDOR 
    move_uploaded_file($thumb, $archivo_subido);

    //guardamos en la BD
    $statement = $conexion->prepare(
        'INSERT INTO articulos(id, titulo, extracto, texto, thumb)
        VALUES (null, :titulo, :extracto, :texto, :thumb)'
    );

    //insertamos los datos en la BD
    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $_FILES['thumb']['name']
    ));

    //Una vez insertados los datos enviamos a 
    //header('Location: '  . RUTA . '/admin');

}


require '../views/nuevo.view.php';



?>