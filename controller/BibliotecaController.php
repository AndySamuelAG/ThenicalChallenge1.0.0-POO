<?php
require_once('../model/Biblioteca.php');

$biblioteca = new Biblioteca();

$biblioteca->cargarMateriales('Libro', 'TCITH', 'Dr. Seuss', 'The cat in the hat', 1957, 'Disponible', 'Penguin Random House Grupo Editorial', 50.35);
$biblioteca->cargarMateriales('Revista', 'DTRE20192012', 'Diario Trome', 'Revista edición 20192012', 2019, 'Disponible', 'Editorial Trome', 2.00);

$biblioteca->cargarPersonas('Profesor', 'Daniel', 'Cadevilla', 'uncorreo@gmail.com', 995522454, 0, 0.0, 5);
$biblioteca->cargarPersonas('Alumno', 'Andy', 'Alvarado', 'andy@gmail.com', 993552222, 0, 0, 10);

$biblioteca->prestamoLlevar('Andy', 'TCITH DTRE20192012');

print_r($biblioteca->prestamos);
    foreach($biblioteca->prestamos as $key=>$items){
        echo "<h1>Status $key</h1>".
            '<h2>Materiales prestados:</h2>';
            echo '<p><b>Adeudo:</b> '.$biblioteca->personas[$key]->getAdeudo().'</br><b>Libros prestados:</b>'.$biblioteca->personas[$key]->getNumLibros().'</p>';
            foreach($items as $item){
                echo '<b>Título:</b> ' . $biblioteca->materiales[$item]->getTitulo(). ', </br><b>precio:</b> S/'.number_format($biblioteca->materiales[$item]->getPrecio(), 2).'</br>';
            }
    }
$biblioteca->prestamoLlevar('Daniel', 'TCITH DTRE20192012');
$biblioteca->prestamoDejar('Andy');
$biblioteca->prestamoDejar('Andy');
$biblioteca->prestamoLlevar('Daniel', 'TCITH DTRE20192012');
foreach($biblioteca->prestamos as $key=>$items){
    echo "<h1>Status $key</h1>".
        '<h2>Materiales prestados:</h2>';
    echo '<p><b>Adeudo:</b> '.$biblioteca->personas[$key]->getAdeudo().'</br><b>Libros prestados:</b>'.$biblioteca->personas[$key]->getNumLibros().'</p>';
    foreach($items as $item){
        echo '<b>Título:</b> ' . $biblioteca->materiales[$item]->getTitulo(). ', </br><b>precio:</b> S/'.number_format($biblioteca->materiales[$item]->getPrecio(), 2).'</br>';
    }
}