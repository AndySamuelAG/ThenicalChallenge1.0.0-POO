<?php
abstract class Persona{
    protected $tipoPersona,
    $nombre,
    $apellido,
    $correo,
    $telefono,
    $numLibros,
    $adeudo;

    public function __construct($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo){
        $this->tipoPersona = $tipoPersona;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->telefono = $telefono;
        $this->numLibros = $numLibros;
        $this->adeudo = $adeudo;
    }

    public function llevarMaterial($precioAdeudo){
        $this->adeudo += $precioAdeudo;
    }

    public function dejarMaterial(){
        $this->numLibros = 0;
        $this->adeudo = 0;
        echo "<p><h1>$this->nombre ha entregado los materiales</h1></p>";
    }


    public function getAdeudo()
    {
        return $this->adeudo;
    }

    public function setNumLibros($numLibros)
    {
        $this->numLibros = $numLibros;
    }
    public function getNumLibros()
    {
        return $this->numLibros;
    }
}