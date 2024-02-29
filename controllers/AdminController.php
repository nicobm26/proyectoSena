<?php 
namespace Controllers;

use Model\Administrador;
use MVC\Router;

class AdminController{

    public static function index(Router $router){
        
        $router->mostrarVista("admin/index",[

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