<h1>producto</h1>

<section class="Click-Producto-Contenedor">

    <article class="cont-miel">
        <h2><?php $producto->nombre ?></h2>
        <a href="Click.html"><img class="imgProductos" src="imagenes/<?php echo $producto->imagen ?>" alt="<?php echo $producto->nombre ?>"></a>
        <p>750ml</p>
        <p><strong>Precio:</strong> <?php $producto->precio ?> COP</p>
        <a href="/producto?codigo=<?php echo $producto->codigo ?>"><button class="button-Producto">Agregar al carrito</button></a>
    </article>

    <article class="CLick-segundo-article">
        <h2>Información</h2>
        <p>Cantidad 
            <select id="cantidad" name="cantidad">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="5">6</option>
                <option value="5">7</option>
                <option value="5">8</option>
                <option value="5">9</option>
                <option value="5">10+</option>
            </select></p>
                <button class="boton-Comprar">Comprar ahora</button><br>
                <button class="boton-Comprar">Agregar al carrito</button><br>
                <a href="/productos"><button class="boton-Comprar">Volver</button></a>
    </article>
</section>