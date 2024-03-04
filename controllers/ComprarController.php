<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;

class ComprarController{

    public static function comprar(Router $router){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $cantidad = $_POST['cantidad'];
            $codigo =  $_POST['codigo'];
            $producto = Producto::where('codigo', $codigo);
            $total = $cantidad * $producto->precio;
            // debuguear($producto);
        
    
        }
        $router->mostrarVista('paginas/comprar', [
            'cantidad' => $cantidad,
            'producto' => $producto,
            'total' => number_format($total,0,',','.')
        ]);

    }
}


?>