<?php 
    $numero_paginas = numero_paginas($blog_config['post_por_pagina'], $conexion); 
?>
<section class="paginacion">
    <ul>
        <?php if(pagina_actual() === 1): ?>
            <li class="disabled">&laquo;</li>
        <?php else: ?>
            <li><a href="index.php?p=<?php echo pagina_actual() -1; ?>">&laquo;</a></li>
        <?php endif; ?>
        
        <?php for($i=1; $i <= $numero_paginas; $i++): ?>
            <!-- SI la ejecusion de la pagina actual es la del ciclo ? estamos en esta pagina-->
            <?php if(pagina_actual() === $i): ?>
                <li class="active">
                    <?php echo $i; ?>
                </li>
            <?php else: ?>
                <li><a href="index.php?p=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endif;?>
        <?php endfor;?>

        <!-- boton para pagina siguiente -->
        <?php if(pagina_actual() == $numero_paginas): ?>
            <li class="disabled">&raquo;</li>
        <?php else: ?> 
        <!-- redirigimos al index.php y traer la pagina actual -->
        <li><a href="index.php?p=<?php echo pagina_actual()  + 1; ?>">&raquo;</a></li>
        <?php endif; ?>
    </ul>

</section>