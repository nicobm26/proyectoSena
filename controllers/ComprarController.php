<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;

class ComprarController{

    public static function comprar(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $codigo = $_POST['codigo'];
            $cantidad = $_POST['cantidad'];
            
            if (isset($_POST['accion'])) {
                $accion = $_POST['accion'];
        
                if ($accion === 'Comprar') {
                    // Se hizo clic en el botón "Comprar"
                    $cantidad = $_POST['cantidad'];
                    $codigo =  $_POST['codigo'];
                    $producto = Producto::where('codigo', $codigo);
                    $total = $cantidad * $producto->precio;

                    $router->mostrarVista('paginas/comprar', [
                        'cantidad' => $cantidad,
                        'producto' => $producto,
                        'total' => number_format($total,0,',','.')
                    ]);
                } elseif ($accion === 'AgregarCarrito') {
                    // Se hizo clic en el botón "Agregar Carrito"
                    //$carrito[]

                }
            }
            
            
            // debuguear($producto);
        }

       

    }
}


?>