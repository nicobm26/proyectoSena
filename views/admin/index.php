<main>
    <h2>Lista de Productos</h2>
    
    <div class="opciones">
        <a class="boton-opcion" href="/admin?all"> Listar Todos</a>
        <a class="boton-opcion" href="/producto/agregar">Agregar Nuevo Producto</a>
        <a class="boton-opcion" href="/medida/agregar">Agregar Nueva Medida</a>
    </div>

    <form  method="POST" class="buscar">
        <div class="campoBuscar">
            <label for="">Buscar por Id</label>
            <input type="text" id="codigo" name="codigo">
        </div>        

        <input class="buscar-boton" type="submit" value="Buscar">
    </form>

    <?php
    if($producto !=null ){
                                ?>
    <div class="card">
            <!-- Apartado izquierdo con imagen y nombre de la producto -->
            <div class="left">
                <!-- <img src="ruta_de_la_imagen" alt="Nombre de la producto" style="width:100%"> -->
                <img src="/imagenes/<?php echo $producto->imagen ?> " alt="imagen de la casa" class="imagen-tabla">
                <p class="property-name"><?php echo $producto->codigo ?></p>
                <p class="property-name"><?php echo $producto->nombre ?></p>
                <p class="property-name"><?php echo $producto->precio ?></p>
            </div>

            <!-- Apartado derecho con características de la producto -->
            <div class="right">
                <p>Stock: <?php echo $producto->stock ?> </p>
                <p>Medida: <?php echo $producto->codigoMedida ?></p>
                <p>Cedula Administrador: <?php echo $producto->cedulaAdministrador ?> </p>
                <!-- Agrega más características aquí según sea necesario -->
            </div>

            <div class="opciones">
                <form method="post" class="w-100" action="/producto/eliminar">
                    <input type="hidden" name="codigo" value="<?php echo $producto->codigo ?>">
                    <input type="hidden" name="tipo" value="producto">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
                <a href="/producto/actualizar?codigo=<?php echo $producto->codigo?>" class="boton-amarillo-block">Actualizar</a>
            </div>
        </div>
    <?php } ?>
<?php
    
    
    foreach ($productos as $producto) {
        ?>
   <div class="card">
            <!-- Apartado izquierdo con imagen y nombre de la producto -->
            <div class="left">
                <!-- <img src="ruta_de_la_imagen" alt="Nombre de la producto" style="width:100%"> -->
                <img src="/imagenes/<?php echo $producto->imagen ?> " alt="imagen de la casa" class="imagen-tabla">
                <p class="property-name"><?php echo $producto->codigo ?></p>
                <p class="property-name"><?php echo $producto->nombre ?></p>
                <p class="property-name"><?php echo $producto->precio ?></p>
            </div>

            <!-- Apartado derecho con características de la producto -->
            <div class="right">
                <p>Stock: <?php echo $producto->stock ?> </p>
                <p>Medida: <?php echo $producto->codigoMedida ?></p>
                <p>Cedula Administrador: <?php echo $producto->cedulaAdministrador ?> </p>
                <!-- Agrega más características aquí según sea necesario -->
            </div>

            <div class="opciones">
                <form method="post" class="w-100" action="/producto/eliminar">
                    <input type="hidden" name="codigo" value="<?php echo $producto->codigo ?>">
                    <input type="hidden" name="tipo" value="producto">
                    <input type="submit" class="boton-rojo-block" value="Eliminar">
                </form>
                <a href="/producto/actualizar?codigo=<?php echo $producto->codigo?>" class="boton-amarillo-block">Actualizar</a>
            </div>
        </div>
    <?php } ?>
    

</main>


