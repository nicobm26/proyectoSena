<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\UnidadesMedida;

class ComprarController{

    public static function comprar(Router $router){       
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $codigo = $_POST['codigo'];
            $cantidad = $_POST['cantidad'];
            $producto = Producto::where('codigo', $codigo);
            $total = $cantidad * $producto->precio;
        }
        $router->mostrarVista('paginas/comprar', [
            'cantidad' => $cantidad,
            'producto' => $producto,
            'total' => number_format($total,0,',','.')
        ]);    
    }

    public static function carrito(Router $router){
        $alertas=[];
        $productos=[];
        $medida = new UnidadesMedida();
        if( !isset($_SESSION['carrito']) ) {
           $alertas['error'][] = 'No hay productos agregados al carrito';
        }else{
            // debuguear($_SESSION['carrito'] );
            foreach ($_SESSION['carrito'] as $producto) {
                // Accedemos a los datos del producto actual
                $codigo = $producto['codigo'];
                $cantidad = $producto['cantidad'];
                $producto = Producto::where('codigo', $codigo);
                $productos[] = $producto;
            }
            
        }
        
        $router->mostrarVista('paginasUsuario/carrito', [                       
            'alertas'=> $alertas ,
            'productos' => $productos
        ]);    
    }
}


?>