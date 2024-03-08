<?php
include_once __DIR__ . '/../templates/alertas.php';
use Model\UnidadesMedida;
$unidad = new UnidadesMedida();
// debuguear($_SESSION['carrito']);
?>
<div class="contenedor-carrito">
    <div class="carrito-izquierda">
        <?php 
        $contador=0;
        foreach ($productos as $producto) { 
            $unidad = UnidadesMedida::where('codigo', $producto->codigoMedida);    
        ?>

        <div class="cajaCarrito">            
            <div>
                <p> <?php echo $producto->nombre ?> </p>
                <p> <?php echo $producto->cantidad . " " .  $unidad->abreviatura ?> </p>
            </div>

            <div>
                <p><span>Cantidad: </span>
                <?php                  
                    echo $_SESSION['carrito'][$contador]['cantidad'];
                ?>
            </p>

            </div>
            <p><span>Total: </span>
            <?php                
                    echo $_SESSION['carrito'][$contador]['cantidad'] * $producto->precio;
            ?>
            </p>

            <div>
                <form action="/eliminarCarrito" method="post">
                    <input type="hidden"  value="<?php echo $producto->codigo ?>">
                    <input type="submit" value="Eliminar">
                </form>

            </div>

            <div>

            </div>
        </div>



        <?php 
         $contador =  $contador + 1;
        } 
        ?>
    </div>
    <div class="carrito-derecha">

    </div>
</div>