<?php 
namespace Controllers;

use Model\Producto;
use MVC\Router;

class PaginasController{

    public static function index(Router $router){
        //$propiedades = Propiedad::some(3);
        $inicio = true;
        $router->mostrarVista("paginas/index",[
            // "propiedades" => $propiedades,
            "inicio" => $inicio
        ]);
    }

    public static function nosotros(Router $router){
        $router->mostrarVista("paginas/nosotros",[                
        ]);
    }

    public static function contactanos(Router $router){
        $router->mostrarVista("paginas/contacto",[                
        ]);
    }

    public static function productos(Router $router){
        $productos = Producto::some(4);
        $router->mostrarVista("paginas/productos",[       
            'productos'=> $productos
        ]);
    }

    public static function producto(Router $router){
        $codigo = $_GET['codigo'];
        $producto = Producto::where('codigo', $codigo);
        $router->mostrarVista("paginas/producto",[       
            'producto'=> $producto
        ]);
    }
}
?>