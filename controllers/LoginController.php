<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Email;

class LoginController{

    public static function login(Router $router){
        $errores = [];
        $auth = new Usuario($_POST);

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Usuario($_POST);
            $alertas = $auth->validarLogin();
            if(empty($alertas)){    
                //1.Comprobar que exista email
                $usuario = Usuario::where('correo', $auth->correo);

                if($usuario){
                     //Existe Usuario, Proseguir a verificar password   
                     if( $usuario->comprobarPasswordAndVerificado($auth->clave)){
                        //Autenticar el usuario
                        if(!isset($_SESSION)) {  
                            session_start();
                        }
                        $_SESSION['cedula'] = $usuario->cedula;
                        $_SESSION['fullname'] = $usuario->nombres . " " . $usuario->apellidos;
                        $_SESSION['correo'] = $usuario->correo;
                        $_SESSION['login'] = true;

                        //Redireccionamiento
                        if($usuario->admin === "1"){
                            $_SESSION['admin'] = $usuario->admin ?? null;
                            header("Location: /admin");
                        }else{
                            header("Location: /cita");
                        }            
                    }else{
                        Usuario::setAlerta('error', 'Clave incorrecta');
                    }
                }else{
                    Usuario::setAlerta('error', 'Usuario NO encontrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->mostrarVista("/auth/login",[
            "errores" => $errores,
            "usuario" => $auth
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
                // debuguear($resultadoCedula);
                $resultadoCorreo = Usuario::where("correo" , $usuario->correo);
                $alertas = $usuario->validarNoCrearUsuariosExistentes($resultadoCedula,$resultadoCorreo);

                if(empty($alertas)){
                    //crear
                    $usuario->hashPassword();

                     // Generar token unico
                     $usuario->crearToken();
                     
                     //confirmar la cuenta sin enlace a correo por el momento
                     $usuario->confirmado=1;

                    //  debuguear($usuario);
                    // Enviar Email
                    //$email = new Email($usuario->correo, $usuario->nombres,$usuario->token);                    
                    //$email->enviarConfirmacion();

                    //Crear Usuario
                    $usuario->guardarLLaveDefinida('cedula');   
        
                    if(!empty($usuario)){                        
                        header("Location: /login");
                    }                                           
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