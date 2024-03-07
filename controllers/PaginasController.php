<?php 
namespace Controllers;

use Model\Producto;
use Model\Administrador;
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
        // $productos = Producto::some(2);
        $productos = Producto::all();
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


    // public static function crearAdmin(Router $router){
    //     $cedula = 27840650;
    //     $nombres = "maria";
    //     $apellidos = "mendoza";
    //     $correo = "maria@gmail.com";
    //     $clave = password_hash("Maria10", PASSWORD_BCRYPT);
    //     // debuguear( $clave);
    //     $persona=[
    //         'cedula'=>$cedula, 
    //         'nombres'=>$nombres, 
    //         'apellidos'=>$apellidos, 
    //         'correo'=>$correo,
    //         'clave'=>$clave
    //     ];
    //     $admin = new Administrador($persona);
    //     $admin->guardarLLaveDefinida('cedula');   
    // }

}
?>