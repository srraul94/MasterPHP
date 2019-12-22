<?php
//Programación Orientada a Objetos.

//Definir una clase

class Coche {

    //Atributos o propiedades
    public $colorCoche; //Desde cualquier lugar
    protected $modelo; //Desde la clase que lo define y heredadas
    private $velocidad; //Solo en esta clase
    public $marca;
    public $cv;
    public $plazas; 

    public function __construct($c,$mo,$cv,$v,$ma,$pl){
         $this->colorCoche = $c;
         $this->modelo = $mo;
         $this->velocidad = $v;
         $this->marca = $ma;
         $this->cv = $cv;
         $this->plazas = $pl;    
    }

    //Métodos , acciones del objeto.

    public function getColor(){
       return $this->colorCoche;
    }

    public function setColor($c){
        $this->colorCoche = $c;
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


    public function mostrarInfo(Coche $coche){
        $informacion = "<h1>Información del coche</h1>";
        $informacion .= "<br>Marca: ".$coche->marca;
        $informacion .= "<br>Modelo: ".$coche->modelo;
        $informacion .= "<br>Color: ".$coche->color;
        $informacion .= "<br>Velocidad: ".$coche->velocidad;
        $informacion .= "<br>CV: ".$coche->cv;
        $informacion .= "<br>Plazas: ".$coche->plazas;

        return $informacion;
    }

} //FIN clase


?>