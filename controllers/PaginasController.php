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
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $codigo = $_POST['codigo'];
            $cantidad = $_POST['cantidad'];
            
            if (isset($_POST['accion'])) {
                $accion = $_POST['accion'];
        
                if ($accion === 'Comprar') {
                    // Se hizo clic en el botón "Comprar"
                
                    $producto = Producto::where('codigo', $codigo);
                    $total = $cantidad * $producto->precio;

                    $router->mostrarVista('paginas/comprar', [
                        'cantidad' => $cantidad,
                        'producto' => $producto,
                        'total' => number_format($total,0,',','.')
                    ]);
                } elseif ($accion === 'AgregarCarrito') {
                    // Se hizo clic en el botón "Agregar Carrito"
                    $producto = new Producto();
                    $producto = Producto::where('codigo', $codigo);  
                    if(! isset($_SESSION['login'])){
                        $alertas['error'][] = 'Debes Iniciar Sesión';                    
                    }else{                    
                        if (!isset($_SESSION['carrito'])) {
                            $_SESSION['carrito'] = array();
                        }
                        $encontrado = false;

                        for ($i = 0; $i < count($_SESSION['carrito']); $i++) {
                        $codigoActual = $_SESSION['carrito'][$i]['codigo'];
                        
                        if ($codigoActual === $codigo) {
                            $_SESSION['carrito'][$i]['cantidad'] = $cantidad;
                            $encontrado = true;
                            break;
                        }
                        }

                        if (!$encontrado) {
                        array_push($_SESSION['carrito'], array("codigo" => $codigo, "cantidad" => $cantidad));
                        }
                        $alertas['exito'][] = 'Agregado al carrito';
                    }
                   
                    $router->mostrarVista('paginas/producto', [                       
                        'alertas' => $alertas,
                        'producto' => $producto
                    ]);
                }
            } 
        }
        $alertas=[];
        $codigo = $_GET['codigo'];
        $producto = Producto::where('codigo', $codigo);
        $router->mostrarVista("paginas/producto",[       
            'producto'=> $producto,
            'alertas'=> $alertas
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