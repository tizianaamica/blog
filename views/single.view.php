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
            <p class="extracto">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sed suscipit culpa unde odit in iure deleniti dolore accusamus tempore. Quis quo hic cumque voluptatem. Ipsum tempore quasi, quos voluptate quas saepe sint officiis debitis repudiandae maxime aliquid deserunt ex ea vero quam ab unde ut accusamus sed, necessitatibus nemo nesciunt consequatur. Tenetur praesentium cumque ullam porro eveniet inventore aut veritatis, dignissimos possimus magni nam ad, reprehenderit ex est deserunt unde, dolorum assumenda tempore nemo iure quia recusandae quo alias. Aspernatur impedit rerum nam odio, consequatur tenetur officia officiis sint! Veniam itaque rem voluptatem saepe ex porro voluptates, omnis ipsum quidem!</p>
        </article>
    </div>
</div>
<?php require 'footer.php'; ?>
</body>

</html>