<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;

class ComprarController{

    public static function comprar(Router $router){
                 
    }

    public static function carrito(Router $router){
        $router->mostrarVista('paginasUsuario/carrito', [                       
        
        ]);    
    }
}


?>