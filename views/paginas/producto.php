<h1>producto</h1>

<section class="Click-Producto-Contenedor">

    <article class="cont-miel">
        <h2><?php $producto->nombre ?></h2>
        <a href="Click.html"><img class="imgProductos" src="imagenes/<?php echo $producto->imagen ?>" alt="<?php echo $producto->nombre ?>"></a>
        <p>750ml</p>
        <p><strong>Precio:</strong> <?php echo $producto->precio ?> COP</p>
        <a href="/producto?codigo=<?php echo $producto->codigo ?>"><button class="button-Producto">Agregar al carrito</button></a>
    </article>

    <article class="CLick-segundo-article">
        <h2>Información</h2>
            <form action="/comprar" method="post">
            <p>Cantidad 
                <select id="cantidad" name="cantidad">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10+</option>
                </select></p>
                <input type="hidden" name="codigo" value="<?php echo $producto->codigo ?>">
                <input type="submit" class="boton-Comprar" name="accion" value="Comprar">
                <input type="submit" class="boton-Comprar" name="accion" value="AgregarCarrito">
            </form>
            
    </article>
</section>