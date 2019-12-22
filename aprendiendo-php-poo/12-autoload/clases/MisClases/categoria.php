<?php
namespace MisClases;

class Categoria {
    public $nombre;
    public $descripcion;

    public function __construct(){
        $this->nombre = "RPG";
        $this->descripcion = "Juegos de Rol";
    }
}