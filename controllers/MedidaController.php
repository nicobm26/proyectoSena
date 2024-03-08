<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\UnidadesMedida;

class MedidaController{

    public static function index(Router $router){      
        $unidades = UnidadesMedida::all(); 
        $unidad = null;
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $codigo = $_POST['codigo'];
            $unidad = UnidadesMedida::where('codigo', $codigo);
        }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $unidades = UnidadesMedida::all();         
        }

        $router->mostrarVista('admin/medida/index', [
            'unidades' => $unidades,
            'unidad' => $unidad
        ]);    
    }

    public static function agregarMedida(Router $router){
       
        $unidadesMedidas = UnidadesMedida::all();    
        // debuguear($unidadesMedidas);
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){    
            $producto = new Producto($_POST['producto']);
         
     
            $alertas = $producto->validar();
            if(empty($alertas)){
    
                // Guarda en la base de datos
                $resultado = $producto->guardarLLaveDefinida('codigo');

                if($resultado) {
                    header('location: /admin');
                }
            }
        }

        $router->mostrarVista("admin/producto/agregarProducto",[
            'unidadesMedidas' => $unidadesMedidas
        ]);
    }

    public static function actualizarMedida(Router $router){
        $unidad = new UnidadesMedida();
        $alertas=[];
        if($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['unidad'])){
            $codigo =  $_POST['codigo'];
            $unidad = UnidadesMedida::where('codigo', $codigo);
        }else{
            $args = $_POST['unidad'];
            // debuguear($args);
            $unidad->sincronizar($args);
            // debuguear($unidad);
            $alertas = $unidad->validar();

            //revisar que el arreglo de errores este vacio
            if(empty($alertas)){      
                $resultado = $unidad->actualizarLlave('codigo', $unidad->codigo);
                if($resultado) {
                    header('location: /medida');
                }
            }
        }
        $router->mostrarVista('admin/medida/actualizarMedida', [
            'unidad' => $unidad,
            'alertas' => $alertas
        ]); 
    }

    public static function eliminarMedida(Router $router){
        if($_SERVER['REQUEST_METHOD']=== "POST"){
            $codigo = $_POST["codigo"];        
            // debuguear($_POST);
            if($codigo){            
                $unidad = UnidadesMedida::where('codigo', $codigo);      
                // debuguear($unidad);      
                $unidad->eliminarLlaveExcepciones('codigo', $codigo);
                debuguear($unidad);
                header('location: /medida');
            }
        }
    }
}


?>