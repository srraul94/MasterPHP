<?php



class Persona {
    private $nombre;
    private $edad;
    private $ciudad;

    public function __construct($n,$e,$c)
    {
        $this->nombre = $n;
        $this->edad = $e;
        $this->ciudad = $c;
    }

    public function __call($name, $arguments)
    {
        $prefix_metodo = substr($name,0,3);
        if($prefix_metodo == 'get'){
            $nombre_metodo = substr(strtolower($name),3);
            
            if(!isset($this->$nombre_metodo)){
                return "El metodo no existe";
            }
            
            return $this->$nombre_metodo;
        } 
        else{
            return "El metodo no existe";
        }  
        return $nombre_metodo;
    }


}

$persona = new Persona('Raul',25,'Merida');
echo $persona->getNombre();
echo $persona->getEdad();
echo $persona->getCiudad();