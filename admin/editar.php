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

//Si los datos han sido enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);
    $extracto = limpiarDatos($_POST['extracto']);
    $texto = $_POST['texto'];
    $id = limpiarDatos($_POST['id']);
    $thumb_guardada = limpiarDatos($_POST['thumb-guardada']);
    $thumb = $_FILES['thumb'];

    //si el nombre de thumb esta vacio = el usuario no subio una nueva
    if (empty($thumb['name'])) {
        $thumb = $thumb_guardada; //dejamos la misma 
    }else{ //subio una nueva
        $archivo_subido = '../' . $blog_config['carpeta_imagenes'] . $_FILES['thumb']['name'];
        //subimos el archivo desde la PC de la persona al servidor
        move_uploaded_file($_FILES['thumb']['tmp_name'], $archivo_subido);
        //
        $thumb = $_FILES['thumb']['name'];
    }

    //ahora subimos los cambios a la BD
    $statement = $conexion->prepare(
        'UPDATE articulos SET titulo = :titulo, extracto = :extracto, texto = :texto, thumb = :thumb WHERE id = :id'
    );

    //ejecutamos la consulta SQL
    $statement->execute(array(
        ':titulo' => $titulo,
        ':extracto' => $extracto,
        ':texto' => $texto,
        ':thumb' => $thumb,
        ':id' => $id
    ));

    header('Location: ' . RUTA . '/admin');

}else{
    //para obtener el id de la pagina
    $id_articulo = id_articulo($_GET['id']);

    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/admin');
    }
    
    $post = obtener_post_por_id($conexion, $id_articulo);
    
    if (!$post) {
        header('Location: ' . RUTA . '/admin');
    }

    $post = $post[0];
}

require '../views/editar.view.php';

?>