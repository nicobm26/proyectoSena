<?php

namespace Model;

class Administrador{
    protected static $tabla = 'administrador';
    protected static $columnasDB = ['cedula','nombres', 'apellidos', 'correo', 'clave'];

    public $cedula;
    public $nombres;
    public $apellidos;
    public $correo;
    public $clave;

    public function __construct($args=[])
    {
        $this->cedula = $args['cedula'];
        $this->nombres = $args['nombres'];
        $this->apellidos = $args['apellidos'];
        $this->correo = $args['correo'];
        $this->clave = $args['clave'];
    }
}