<?php


interface Ordenador {
    public function encender();
    public function apagar();
    public function reiniciar();
}

class iMac implements Ordenador{
    private $modelo;

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }

    public function encender(){
        echo "encender";
    }

    public function apagar(){
        echo "apagar";
    }

    public function reiniciar(){
        echo "reiniciar";
    }

}

$macintosh = new iMac();
$macintosh->setModelo('Mac Pro 2019');
var_dump($macintosh);