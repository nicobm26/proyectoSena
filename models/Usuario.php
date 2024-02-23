<?php

namespace Model;

class Usuario extends ActiveRecord{
     // Base de Datos
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['cedula','correo','nombres','apellidos','telefono','clave','confirmado','token'];
 
    public $cedula;
    public $correo;
    public $nombres;
    public $apellidos;
    public $telefono;    
    public $clave;    
    public $confirmado;
    public $token;
 
    public function __construct($args=[]){
        $this->cedula = $args['cedula'] ?? null;
        $this->correo = $args['correo'] ?? '';
        $this->nombres = $args['nombres'] ?? '';
        $this->apellidos = $args['apellidos'] ?? '';
        $this->telefono = $args['telefono'] ?? '';        
        $this->clave = $args['clave'] ?? '';       
        $this->confirmado = $args['confirmado'] ?? '0';
        $this->token = $args['token'] ?? '';
    }
   
}
?>