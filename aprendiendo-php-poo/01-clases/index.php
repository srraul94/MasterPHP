<h1>Hola mundo!</h1>

<?php
//Programación Orientada a Objetos.

//Definir una clase

class Coche {

    //Atributos o propiedades
    public $color = "Rojo";
    public $modelo = "Serie 4";
    public $velocidad = 250;
    public $marca = "BMW";
    public $cv = 270;
    public $plazas = 4;    

    //Métodos , acciones del objeto.

    public function getColor(){
       return $this->$color;
    }

    public function setColor($c){
        $this->$color = $c;
    }

    public function acelerar(){
        $this->velocidad++;
    }

    public function frenar(){
        $this->velocidad--;
    }
    public function getVelocidad(){
        return $this->velocidad;
    }
} //FIN clase

//Crear un objeto de tipo coche

$coche = new Coche();

echo $coche->getVelocidad();
$coche->setColor("Amarillo");
echo $coche->getColor() .'<br>';



?>