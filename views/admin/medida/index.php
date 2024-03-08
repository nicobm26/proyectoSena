<main>
    <h2>Lista de Productos</h2>
    
    <div class="opciones">
        <a class="boton-opcion" href="/medida"> Listar Todos</a>
        <a class="boton-opcion" href="/medida/agregar">Agregar Nueva Medida</a>
        <a class="boton-opcion" href="/admin">Volver</a>
    </div>

    <form  method="POST" class="buscar">
        <div class="campoBuscar">
            <label for="">Buscar por Id</label>
            <input type="text" id="codigo" name="codigo">
        </div>        

        <input class="buscar-boton" type="submit" value="Buscar">
    </form>

    <?php
    if($unidad != null ){
                                ?>
    <div class="card">
            <!-- Apartado izquierdo con imagen y nombre de la producto -->
            <div class="left">
                <p class="property-name"><span>Codigo: </span><?php echo $unidad->codigo ?></p>
                <p class="property-name"><span>Nombre: </span><?php echo $unidad->abreviatura ?></p>
                <p class="property-name"><span>Precio: </span><?php echo $unidad->abreviatura ?></p>
            </div>

            <div class="opciones">
                <form method="post" class="w-100" action="/producto/eliminar">
                    <input type="hidden" name="codigo" value="<?php echo $unidad->codigo ?>">
                    <input type="hidden" name="tipo" value="producto">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
                <a href="/producto/actualizar?codigo=<?php echo $unidad->codigo?>" class="boton-amarillo-block">Actualizar</a>
            </div>
        </div>
    <?php } else {?>
<?php
    
    
    foreach ($unidades as $unidad) {
        ?>
   <div class="card">
            <!-- Apartado derecho con características de la producto -->
            <div >
                <p class="property-name"><span>Codigo: </span><?php echo $unidad->codigo ?></p>
                <p class="property-name"><span>Nombre: </span><?php echo $unidad->descripcion ?></p>
                <p class="property-name"><span>Precio: </span><?php echo $unidad->abreviatura ?></p>
            </div>

            <div class="card__opciones">
                <form method="post" class="w-100" action="/medida/eliminar">
                    <input type="hidden" name="codigo" value="<?php echo $unidad->codigo ?>">
                    <input type="submit" class="boton-eliminar" value="Eliminar">
                    <input type="submit" class="boton-actualizar" formaction="/medida/actualizar" value="Actualizar" >
                </form>
                <!-- <a href="/medida/actualizar?codigo=<?php echo $unidad->codigo?>" class="boton-actualizar">Actualizar</a> -->
            </div>
        </div>
    <?php } 
    }
    ?>
    

</main>


