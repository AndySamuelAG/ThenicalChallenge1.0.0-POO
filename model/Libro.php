<?php
require_once('Material.php');
class Libro extends Material{
    protected $editorial;
    public function __construct($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $editorial, $precio)
    {
        parent::__construct($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $precio);
        $this->editorial = $editorial;
    }
}