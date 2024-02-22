<?php

namespace Controllers;

use MVC\Router;

class LoginController{

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
            // $auth = new Admin($_POST);

            // $errores = $auth->validar();

            // //Verificar si existe un usuario
            // $resultado = $auth->existeUsuario();

            // if(! $resultado){
            //     // No existe el usuario (traer mensaje de error)
            //     $errores = Admin::getErrores();
            // }else{
            //     // Si existe el usuario
            //     // Verificar la contraseña
            //     $autenticado = $auth->comprobarPassword($resultado);

            //     if($autenticado){
            //         $auth->autenticar();
            //     }else{
            //         $errores = Admin::getErrores();
            //     }

            // }
            
        }

        $router->mostrarVista("/auth/login",[
            "errores" => $errores
        ]);
    }


}
?>