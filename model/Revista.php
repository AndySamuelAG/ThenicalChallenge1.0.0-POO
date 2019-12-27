<?php
require_once('Material.php');
class Revista extends Material{
    public function __construct($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $precio)
    {
        parent::__construct($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $precio);
    }
}