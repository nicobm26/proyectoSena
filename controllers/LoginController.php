<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;
use Classes\Email;
use Model\Administrador;

class LoginController{

    public static function login(Router $router){        
        $alertas = [];
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

                        //Redireccionamiento   ///Re pensar, ya que nostros tenems            
                        header("Location: /");      
                    }else{
                        Usuario::setAlerta('error', 'Clave incorrecta');
                    }
                }else{
                    Usuario::setAlerta('error', 'Correo no registrado');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        $router->mostrarVista("/auth/login",[
            "alertas" => $alertas,
            "usuario" => $auth
        ]);
    }

    public static function loginAdministrador(Router $router){
        $alertas = [];
        $auth = new Administrador();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new Administrador($_POST);
            $alertas = $auth->validarLogin();
            if(empty($alertas)){    
                //1.Comprobar que exista email
                $admin = Administrador::where('correo', $auth->correo);
                if($admin){
                     //Existe Usuario, Proseguir a verificar password   
                     if(  $admin->comprobarPassword($auth->clave)  ){
                        //Autenticar el usuario
                        if(!isset($_SESSION)) {  
                            session_start();
                        }
                        $_SESSION['cedula'] = $admin->cedula;
                        $_SESSION['fullname'] = $admin->nombres . " " . $admin->apellidos;
                        $_SESSION['correo'] = $admin->correo;
                        $_SESSION['login'] = true;
                        $_SESSION['rol'] = 'admin';

                        //Redireccionamiento   ///Re pensar, ya que nostros tenems            
                        header("Location: /admin");      
                    }else{
                        Administrador::setAlerta('error', 'Clave incorrecta');
                    }
                }else{
                    Administrador::setAlerta('error', 'Correo no registrado');
                }
            }
        }
        $alertas = Administrador::getAlertas();
        $router->mostrarVista("/auth/login",[
            "alertas" => $alertas,
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