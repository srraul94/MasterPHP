<?php

class Persona {

    public $nombre;
    public $apellidos;
    public $altura;
    public $edad;


    public function getNombre(){
        return $this->nombre;
    }    
    public function setNombre($n){
        $this->nombre = $n;
    }

    public function getApellidos(){
        return $this->apellidos;
    }    
    public function setApellidos($a){
        $this->apellidos = $a;
    }

    public function getAltura(){
        return $this->altura;
    }    
    public function setAltura($a){
        $this->altura = $a;
    }

    public function getEdad(){
        return $this->edad;
    }    
    public function setEdad($e){
        $this->edad = $e;
    }

    public function hablar(){
        return "hola amigo!";
    }

}

class Informatico extends Persona{

    public $lenguajes;

    public function __construct($l)
    {
        parent::__construct();
        $this->lenguajes = $l;
    }

    public function programar(){
        return "Soy developer";
    }
    public function repararOrdenador(){
        return "Se reparar";
    }
}




?>