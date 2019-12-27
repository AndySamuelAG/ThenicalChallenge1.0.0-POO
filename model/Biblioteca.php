<?php
require_once('Libro.php');
require_once('Revista.php');
require_once('Profesor.php');
require_once('Alumno.php');
class Biblioteca{
    public $materiales = [];
    public $personas = [];
    public $prestamos = [];
    function cargarMateriales($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $editorial, $precio){
        if($tipoMaterial == 'Libro'){
            $obj = new Libro($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $editorial, $precio);
            $this->materiales[$codigo] = $obj;
        }else{
            $obj = new Revista($tipoMaterial, $codigo, $autor, $titulo, $anio, $status, $precio);
            $this->materiales[$codigo] = $obj;
        }
    }
    function cargarPersonas($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo, $extra){
        if($tipoPersona == 'Profesor'){
            $obj = new Profesor($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo, $extra);
            $this->personas[$nombre] = $obj;
        }else{
            $obj = new Alumno($tipoPersona, $nombre, $apellido, $correo, $telefono, $numLibros, $adeudo, $extra);
            $this->personas[$nombre] = $obj;
        }
    }

    // Una persona deja un material prestado.
    function prestamoLlevar($nombrePersona, $codMaterial){
        if(strpos($codMaterial, ' ') != 0){
            $puedePrestar = true;
            $materiales = explode(' ', $codMaterial);
            foreach($materiales as $material) {
                if ($this->materiales[$material]->getStatus() != 'Disponible') {
                    $puedePrestar = false;
                    break;
                }
            }
        }else{
            $materiales = array($codMaterial);
        }
        if($puedePrestar){
            $precio = 0;
            foreach($materiales as $material){
                $precio += $this->materiales[$material]->getPrecio();
                $this->materiales[$material]->bajaMaterial();

            }
            $this->personas[$nombrePersona]->llevarMaterial($precio);
            $this->personas[$nombrePersona]->setNumLibros(count($materiales));
            $this->prestamos[$nombrePersona] = $materiales;
        }else{
            echo '<h1>Alguno de los libros no está disponibles</h1>';
        }
    }

    // Una persona deja un material prestado.
    function prestamoDejar($nombrePersona){
        if(count($this->prestamos[$nombrePersona]) > 0){
            $this->personas[$nombrePersona]->dejarMaterial();
            $materiales = $this->prestamos[$nombrePersona];
            foreach($materiales as $material){
                $this->materiales[$material]->altaMaterial();
            }
            $this->prestamos[$nombrePersona] = [];
        }else{
            echo '<h1>No tienes materiales para entregar</h1>';
        }
    }
}