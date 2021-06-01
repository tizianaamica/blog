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
    <div class="post">
        <article>
            <h2 class="titulo">Nuevo Articulo</h2> <!-- -->
            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="titulo" placeholder="Titulo del Articulo">
                <input type="text" name="extracto" placeholder="Extracto del Articulo">
                <textarea name="texto" placeholder="Texto del Articulo"></textarea>
                <input type="file" name="thumb">

                <input type="submit" value="Crear Articulo">
            </form>
        </article>
    </div>
</div>
<?php require 'footer.php'; ?>
</body>

</html>