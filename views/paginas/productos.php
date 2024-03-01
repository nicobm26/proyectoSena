<h1 class="centrar-T-Producto">PRODUCTOS</h1>

<div class="combobox">
    <select name="seleccion">
        <option value="">Selecciona una opción</option>
        <option value="opcion1">MIEL</option>
        <option value="opcion2">POLEN</option>
        <option value="opcion3">PROPOLEO</option>
        <option value="opcion1">JALEA REAL</option>
        <option value="opcion2">CAJA DE PANAL</option>
    </select>
</div>
<section class="Cont-Productos">
    <?php
    foreach($productos as $producto){
        ?>
        <article class="cont-miel">
        <h2><?php $producto->nombre?></h2>
        <a href="/producto?codigo=<?php echo $producto->codigo?>"><img class="imgProductos" src="imagenes/<?php echo $producto->imagen?>" alt="<?php echo $producto->nombre?>"></a>
        <p>750ml</p>
        <p><strong>Precio:</strong> <?php $producto->precio?> COP</p>
        <a href="/producto?codigo=<?php echo $producto->codigo?>"><button class="button-Producto">Ver Más</button></a>        
    </article>

    <?php
    }
    ?>
</section>

