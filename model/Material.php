<?php
abstract class Material{
    protected $tipoMaterial,
    $codigo,
    $autor,
    $titulo,
    $anio,
    $status,
    $precio;

    public function __construct($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $precio){
        $this->tipoMaterial = $tipoMaterial;
        $this->codigo = $codigo;
        $this->autor = $autor;
        $this->titulo = $titulo;
        $this->anio = $anio;
        $this->status = $status;
        $this->precio = $precio;
    }

    public function altaMaterial(){
        $this->status = 'Disponible';
    }

    public function bajaMaterial(){
        $this->status = 'Ocupado';
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

//    public function cambioMaterial(){
//
//    }
}