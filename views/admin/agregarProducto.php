<h1>Agregar producto</h1>

<form method="POST" class="formulario" enctype="multipart/form-data">

    <div class="campo">
        <label for="codigo">Código</label>
        <input type="text" id="codigo" name="producto[codigo]">
    </div>

    <div class="campo">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="producto[nombre]">
    </div>

    <div class="campo">
        <label for="descripcion">Descripción</label>
        <textarea id="descripcion" name=producto[descripcion]"> </textarea>  
    </div>

    <div class="campo">
        <label for="precio">Precio</label>
        <input type="number" id="precio" name="producto[precio]">
    </div>

    <div class="campo">
        <label for="stock">Stock</label>
        <input type="number" id="stock" name="producto[stock]">
    </div>

    <div class="campo">
        <label for="imagen">Imagen</label>
        <input type="file" 
                id="imagen" 
                name="producto[imagen]" 
                accept="image/jpeg, image/png">
    </div>

    <div class="campo">
        <label for="codigoMedida">Codigo de Medida</label>
        <?php
        echo '<select name="producto[codigoMedida]">';
            foreach ($unidadesMedidas as $unidadMedida) {
                echo '<option value="' . $unidadMedida->codigo . '">' . $unidadMedida->descripcion . '</option>';        
            }
        echo '</select>';
        ?>    
    </div>

    <input type="submit" value="enviar" class="boton">
</form>