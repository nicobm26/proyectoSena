<?php

namespace Model;

class UnidadesMedida extends ActiveRecord{
    protected static $tabla = 'unidades_medida';
    protected static $columnasDb = ['codigo', 'descripcion', 'abreviatura'];

    public $codigo;
    public $descripcion;
    public $abreviatura;

    public function __construct($args=[])
    {
        $this->codigo = $args['codigo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->abreviatura = $args['abreviatura'] ?? '';
    }

}
