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

<?php require 'views/header.php' ?>

<div class="contenedor">
    <?php foreach ($posts as $post) : ?>
        <div class="post">
            <article>
                <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['titulo']; ?></a></h2>
                <p class="fecha"><?php echo $post['fecha']; ?></p>
                <div class="thumb">
                    <a href="single.php?id=<?php echo $post['id']; ?>">
                        <img src="<?php echo RUTA;?>/imagenes/<?php echo $post['thumb']; ?>" alt="">
                    </a>
                </div>
                <p class="extracto"><?php echo $post['extracto']; ?></p>
                <a href="single.php?id=<?php echo $post['id']; ?>" class="continuar">Continuar Leyendo</a>
            </article>
        </div>
    <?php endforeach; ?>

    <?php require 'paginacion.php'; ?>
</div>
<?php require 'footer.php'; ?>
</body>

</html>