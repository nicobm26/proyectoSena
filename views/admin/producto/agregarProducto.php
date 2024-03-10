<h1>Agregar producto</h1>

<div>
    <a href="/administrarProducto" class="boton">Volver</a>
</div>


<form method="POST" class="formulario contenedorFormulario" enctype="multipart/form-data">

    <div class="campo">
        <label class="campo__name" for="codigo">Código</label>
        <input type="text" id="codigo" name="producto[codigo]">
    </div>

    <div class="campo">
        <label  class="campo__name" for="nombre">Nombre</label>
        <input type="text" id="nombre" name="producto[nombre]">
    </div>

    <div class="campo">
        <label class="campo__name" for="descripcion">Descripción</label>
        <textarea id="descripcion" name=producto[descripcion]"> </textarea>  
    </div>

    <div class="campo">
        <label class="campo__name" for="cantidad">Cantidad</label>
        <input type="number" id="cantidad" name="producto[cantidad]">
    </div>

    <div class="campo">
        <label class="campo__name" for="precio">Precio</label>
        <input type="number" id="precio" name="producto[precio]">
    </div>

    <div class="campo">
        <label class="campo__name" for="stock">Stock</label>
        <input type="number" id="stock" name="producto[stock]">
    </div>

    <div class="campo">
        <label class="campo__name" for="imagen">Imagen</label>
        <input type="file" 
                id="imagen" 
                name="producto[imagen]" 
                accept="image/jpeg, image/png">
    </div>

    <div class="campo">
        <label class="campo__name" for="codigoMedida">Codigo de Medida</label>
        <?php
        echo '<select name="producto[codigoMedida]">';
            foreach ($unidadesMedidas as $unidadMedida) {
                echo '<option value="' . $unidadMedida->codigo . '">' . $unidadMedida->descripcion . '</option>';        
            }
        echo '</select>';
        ?>    
    </div>

    <input 
        type="submit" 
        value="Agregar" 
        class="boton"
        onclick="servicioCreado(event)"
        >
</form>

<?php
$script = "
    <script src='//cdn.jsdelivr.net/npm/sweetalert2@10'></script>
    <script src='/build/js/alertas.js'></script>
    <script src='https://kit.fontawesome.com/d74a8aa5fa.js' crossorigin='anonymous'></script>
";
?>