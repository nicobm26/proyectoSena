<?php 
namespace Controllers;

use Model\Administrador;
use Model\Producto;
use MVC\Router;

use Intervention\Image\ImageManagerStatic as Image;


use Model\UnidadesMedida;

class AdminController{

    public static function index(Router $router){
        $productos = Producto::all();
        
        $router->mostrarVista("admin/index",[
            'productos' => $productos
        ]);
    }

    public static function agregarProducto(Router $router){

        $unidadesMedidas = UnidadesMedida::all();    
        // debuguear($unidadesMedidas);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){    
            $producto = new Producto($_POST['producto']);
            $producto->cedulaAdministrador = $_SESSION['cedula'];
            $imagen = $_FILES['producto'];
            
            $nombreImagen = $_POST['producto']['codigo']  . ".jpg";;
            // debuguear($nombreImagen);
            // debuguear( $nombreImagen);
            if($_FILES['producto']['tmp_name']['imagen']){
                // create new image instance (800 x 600)
                $image = Image::make($_FILES['producto']['tmp_name']['imagen'])->fit(800,600);            
                $producto->setImagen($nombreImagen);
            }
            
            $alertas = $producto->validar();
            if(empty($alertas)){
    
                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }    
                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);
                
                // Guarda en la base de datos
                $resultado = $producto->guardarLLaveDefinida('codigo');

                if($resultado) {
                    header('location: /admin');
                }
            }
        }

        $router->mostrarVista("admin/agregarProducto",[
            'unidadesMedidas' => $unidadesMedidas

        ]);
    }


    public static function actualizarProducto(Router $router){
        $unidadesMedidas = UnidadesMedida::all();

         $router->mostrarVista("admin/actualizarProducto",[
            'unidadesMedidas' => $unidadesMedidas

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