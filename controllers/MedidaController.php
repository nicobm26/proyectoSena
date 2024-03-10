<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\UnidadesMedida;

class MedidaController{

    public static function index(Router $router){    
        isAdmin();  
        $unidades = UnidadesMedida::all(); 
        $unidad = null;
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $codigo = $_POST['codigo'];
            $unidad = UnidadesMedida::where('codigo', $codigo);
            if(empty($unidad)){
                $alertas['error'][] = 'No se encuentra ese codigo de medida';
            }
        }else if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $unidades = UnidadesMedida::all();         
        }

        $router->mostrarVista('admin/medida/index', [
            'unidades' => $unidades,
            'unidad' => $unidad,
            'alertas' => $alertas
        ]);    
    }

    public static function agregarMedida(Router $router){
        isAdmin(); 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){    
            $unidad = new UnidadesMedida( array_map("trim", $_POST['producto']));
            $alertas = $unidad->validar();
            if(empty($alertas)){
                // Guarda en la base de datos
                $resultado = $unidad->guardarLLaveDefinida('codigo');

                if($resultado) {
                    header('location: /medida');
                }
            }
        }

        $router->mostrarVista("admin/medida/agregarMedida",[        
        ]);
    }

    public static function actualizarMedida(Router $router){
        isAdmin(); 
        $unidad = new UnidadesMedida();
        $alertas=[];

        if($_SERVER['REQUEST_METHOD'] === 'GET'){
            $codigo =  $_GET['codigo'];
            $unidad = UnidadesMedida::where('codigo', $codigo);
        }else if($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['unidad'])){
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
        isAdmin(); 
        if($_SERVER['REQUEST_METHOD']=== "POST"){
            $codigo = $_POST["codigo"];        
            // debuguear($_POST);
            if($codigo){            
                $unidad = UnidadesMedida::where('codigo', $codigo);      
                // debuguear($unidad);      
                $unidad->eliminarLlaveExcepciones('codigo', $codigo);
                // debuguear($unidad);
                header('location: /medida');
            }
        }
    }
}


?>