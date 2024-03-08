<h1 class="centrar-T-Producto">PRODUCTOS</h1>


<section class="Cont-Productos">
    <?php
    foreach($productos as $producto){
        ?>
        <article class="cont-miel">
        <h2 class="titulo-producto"><?php echo $producto->nombre?></h2>
        <a href="/producto?codigo=<?php echo $producto->codigo?>"><img class="imgProductos" src="imagenes/<?php echo $producto->imagen?>" alt="<?php echo $producto->nombre?>"></a>
        <p>750ml</p>
        <p><strong>Precio:</strong> <?php echo number_format($producto->precio, 0, ',' , '.')  ?> COP</p>
        <a href="/producto?codigo=<?php echo $producto->codigo?>"><button class="button-Producto">Ver Más</button></a>        
    </article>

    <?php
    }
    ?>
</section>

