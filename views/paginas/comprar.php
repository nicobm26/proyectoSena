<div class="cajaInfo">
    <div>
        <img src="imagenes/<?php echo $producto->imagen ?>" alt="Imagen del producto">
    </div>
    <div>
        <p>Nombre: <span><?php echo $producto->nombre; ?></span></p>
        <p>Cantidad: <span><?php echo $cantidad; ?></span></p>
        <p>Medida: <span><?php echo $producto->codigoMedida; ?></span></p>
        <p>Precio Total: <span><?php echo $total; ?></span></p>
    </div>
</div>