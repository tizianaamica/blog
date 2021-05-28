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
    <div class="post">
        <article>
            <h2 class="titulo">Titulo del articulo</h2>
            <p class="fecha">10 de Enero de 2020</p>
            <div class="thum">
                <a href="#">
                    <img src="<?php echo RUTA; ?>/imagenes/2.jpg" alt="">
                </a>
            </div>

            <p class="extracto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, natus.</p>
            <a href="#" class="continuar">Continuar Leyendo</a>
        </article>
    </div>

    <div class="post">
        <article>
            <h2 class="titulo">Titulo del articulo</h2>
            <p class="fecha">10 de Enero de 2020</p>
            <div class="thum">
                <a href="#">
                    <img src="<?php echo RUTA; ?>/imagenes/4.jpg" alt="">
                </a>
            </div>

            <p class="extracto">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, natus.</p>
            <a href="#" class="continuar">Continuar Leyendo</a>
        </article>
    </div>
    <?php require 'paginacion.php'; ?>
</div>
<?php require 'footer.php'; ?>
</body>

</html>