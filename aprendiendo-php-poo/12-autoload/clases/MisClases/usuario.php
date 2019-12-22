<?php
namespace MisClases;


class Usuario {
    public $nombre;
    public $email;

    public function __construct(){
        $this->nombre = "Raul Sanchez";
        $this->email = "raul@mail.com";
    }
}