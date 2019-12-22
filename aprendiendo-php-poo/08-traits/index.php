<?php

trait Utilidades{
    public function mostrarNombre(){
        echo "<h1>El nombre es ".$this->nombre." </h1>";
    }
}

class Coche {
    public $nombre;
    public $marca;

    use Utilidades;
}

class Persona {
    public $nombre;
    public $apellido;

    use Utilidades;

}

class Videojuego{
    public $nombre;
    public $publicacion;

    use Utilidades;

}

$coche = new Coche();
$coche->nombre = "Ferrari";
$coche->mostrarNombre();

$persona = new Persona();
$persona->nombre = "Jose";
$persona->mostrarNombre();

$videojuego = new Videojuego();
$videojuego->nombre = "TLOU";
$videojuego->mostrarNombre();

