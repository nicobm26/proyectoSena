<div class="cajaInfo">
    <div class="cajaInfo-imagen">
        <img src="imagenes/<?php echo $producto->imagen ?>" alt="Imagen del producto">
    </div>
    <div class="cajaInfo-info">
        <p class="pr"><span>Nombre: </span> <?php echo $producto->nombre; ?></p>
        <p><span>Cantidad: </span> <?php echo $cantidad; ?></p>
        <p><span>Medida: </span> <?php echo $producto->codigoMedida; ?></p>
        <p><span>Precio Total: </span> <?php echo $total; ?></p>
    </div>
    <div class="cajaInfo-enviar">
        <input type="submit" class="boton-comun" value="Comprar">
    </div>
</div>