<?php 
require_once 'clases.php';

$persona = new Persona();
$persona->setNombre("Raul");
var_dump($persona);

$informatico = new Informatico('Php,Java,JS');
var_dump($informatico);


?>