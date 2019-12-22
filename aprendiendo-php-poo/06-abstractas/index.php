

<?php

abstract class Ordenador{
    public $encendido;

    abstract public function encender();

    public function apagar(){
        $this->encendido = false;
    }
}

class Asus extends Ordenador{
    public $software;

    public function arrancarSoftware(){
        $this->software = true;
    }

    public function encender(){
        $this->encendido = true;
    }
}

$asus = new Asus();
$asus->arrancarSoftware();
$asus->encender();
$asus->apagar();
var_dump($asus);

