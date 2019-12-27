<?php
require_once('Persona.php');
class Alumno extends Persona{
    protected $matricula;
    public function __construct($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo, $matricula)
    {
        parent::__construct($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo);
        $this->matricula = $matricula;
    }
}