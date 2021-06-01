<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>css/estilos.css">
    <title>Blog</title>
</head>

<?php require '../views/header.php' ?>

<div class="contenedor">
    <h2>Panel de Control</h2>
    <a href="nuevo.php" class="btn">Nuevo Post</a>
    <a href="cerrar.php" class="btn">Cerrar Sesion</a>
    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <article>
                <h2 class="titulo"><?php echo $post['id'] . '.-' . $post['titulo'] ; ?></h2>
                <a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
                <a href="../single.php?id=<?php echo $post['id']; ?>">Ver</a>
                <a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>
            </article>
        </div>
    <?php endforeach; ?>
    
    <?php require '../paginacion.php'; ?>
</div>
<?php require '../views/footer.php'; ?>
</body>

</html>