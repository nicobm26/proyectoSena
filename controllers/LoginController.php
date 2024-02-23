<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController{

    public static function login(Router $router){
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
        }

        $router->mostrarVista("/auth/login",[
            "errores" => $errores
        ]);
    }

    public static function registrar(Router $router){
        $alertas = [];
        $usuario = new Usuario();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            // debuguear($_POST);
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
            if(empty($alertas)){
                $resultadoCedula = Usuario::where("cedula" , $usuario->cedula);
                $resultadoCorreo = Usuario::where("correo" , $usuario->correo);
                $alertas = $usuario->validarNoCrearUsuariosExistentes($resultadoCedula,$resultadoCorreo);

                if(empty($alertas)){
                    //crear
                    $usuario->guardarLLaveDefinida('cedula');            
                    debuguear($usuario);
                }
            }                                
        }

        $router->mostrarVista("/auth/registrar",[
            "usuario" => $usuario,
            "alertas"=> $alertas
        ]);
    }


}
?>