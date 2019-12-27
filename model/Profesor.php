<?php
require_once('Persona.php');
class Profesor extends Persona{
    protected $numEmpleado;

    public function __construct($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo, $numEmpleado)
    {
        parent::__construct($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo);
        $this->numEmpleado = $numEmpleado;
    }
}