<h1>Agregar producto</h1>

<form method="POST" class="formulario" enctype="multipart/form-data">

    <div class="campo">
        <label for="codigo">Código</label>
        <input type="text" id="codigo" name="producto[codigo]" 
        value="<?php echo $producto->codigo; ?>"
        >
    </div>

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="producto[nombre]"
        value="<?php echo $producto->nombre; ?>"
        >
    </div>

    <div class="campo">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name=producto[descripcion]"
        value="<?php echo $producto->descripcion; ?>"
        > </textarea>  
    </div>

    <div class="campo">
        <label for="precio">Precio</label>
        <input type="number" id="precio" name="producto[precio]"
        value="<?php echo $producto->precio; ?>"
        >
    </div>

    <div class="campo">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="producto[stock]"
        value="<?php echo $producto->stock; ?>"
        >        
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" 
                id="imagen" 
                name="producto[imagen]" 
                accept="image/jpeg, image/png">

        <?php if ($producto->imagen && file_exists(CARPETA_IMAGENES . $producto->imagen)): ?>
                    <?php echo $producto->imagen ?>
                    <img src="/imagenes/<?php echo $producto->imagen ?>" class="imagen-small" alt="Imagen subida">
        <?php endif ?>  
    </div>

    <div class="campo">
        <label for="codigoMedida">Codigo de Medida</label>
        <select name="producto[codigoMedida]" id="codigoMedida">
                    <option value="">--Seleccionar--</option>
                    <?php foreach($unidadesMedidas as $unidadesMedida) : ?>
                        <option 
                            <?php echo $producto->codigoMedida === $unidadesMedida->codigo ? 'selected' : ""?>
                            value="<?php echo s($unidadesMedida->codigo); ?>"><?php echo s($unidadesMedida->descripcion);  ?>
                        </option>

                    <?php endforeach ; ?>
                </select> 
    </div>

    <input type="submit" value="enviar" class="boton">
</form>