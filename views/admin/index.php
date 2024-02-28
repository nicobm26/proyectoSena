<main>
    <h2>Lista de Productos</h2>
    
    <div>
        <a href="">Agregar Nuevo Producto</a>
        <a href="">Agregar Nueva Medida</a>
    </div>

    <div>
        <label for="">Buscar por Id</label>
        <input type="text">
    </div>

    <div class="card">
				<div>
					<p>Id: <?php echo $fila -> Id_Producto ?></p>
					<p>Producto: <?php echo $fila -> Descripcion  ?></p>
					<p>Precio: <?php echo $fila -> Precio_Unitario  ?></p>
					<p>Stock: <?php echo $fila -> Stock ?></p>
					<p>Medida: <?php echo $fila -> Abreviatura ?></p>

					<?php 
					$sql = "select p.Id_Producto , p.Descripcion, t.Nombre as NombreEvento, e.Descripcion AS Evento_Descripcion from productos p
					inner join eventos e on p.Id_Producto = e.Id_Producto
					inner join tipo_eventos t on t.Id_TipoEvento = e.Id_TipoEvento
					where p.Id_Producto= $fila->Id_Producto;";
					$eventoProducto = $conn -> query($sql);
					if($eventoProducto->fetchObject()){
						$eventoProducto = $conn -> query($sql);
						echo "<div class='linea'></div>";
						echo "<p>Evento: Descripcion del evento registrado </p>";
						while($evento = $eventoProducto->fetchObject()){
							echo "<p class='eventoProducto'> $evento->NombreEvento : $evento->Evento_Descripcion  </p>";
						}
					}
					
					?>
				</div>
				<div class="card__opciones">
					<a class="btn" <?php  echo "href='/productos/editar.php?Id_Producto=" . $fila -> Id_Producto . "'" ?>> Editar</a>
					<a  class="btn"  <?php echo "href='/productos/eliminar.php?Id_Producto=" . $fila -> Id_Producto . "'" ?> >Eliminar</a>
					<a  class="btn"  <?php echo "href='/productos/addEventoAProducto.php?Id_Producto=" . $fila -> Id_Producto . "'"?>>Agregar Evento</a>
					<!-- <a href='evento.php?Id_Producto=" . $Row -> Id_Producto . "'>AgregarEvento</a><br>"; -->
					<label><input type="checkbox" id="cbox1" name="carro[<?php echo $fila->Id_Producto ?>]" value="<?php echo $fila->Id_Producto ?>" /> Agregar Carrito</label>
					<label><input type="checkbox" id="cbox2" name="evento[<?php echo $fila->Id_Producto ?>]" value="<?php echo $fila->Id_Producto ?>" /> Agregar Lista Evento</label>
				</div>
			</div>
</main>


