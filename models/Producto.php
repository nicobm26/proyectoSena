<?php

namespace Model;

class Producto{
    protected static $tabla = 'producto';
    protected static $columnasBD = ['codigo','nombre','descripcion','precio','stock','imagen','codigoMedida'];
    
    public $codigo;
    public $nombre;
    public $descripcion;
    public $precio;
    public $stock;
    public $imagen;
    public $codigoMedida;

    public function __construct($args=[])
    {
        $this->codigo = $args['codigo'];
        $this->nombre = $args['nombre'];
        $this->descripcion = $args['descripcion'];
        $this->precio = $args['precio'];
        $this->stock = $args['stock'];
        $this->imagen = $args['imagen'];
        $this->codigoMedida = $args['codigoMedida'];
    }
}