<?php



class Usuario {

    public $nombre;
    public $apellidos;

    public function __construct(){
        $this->nombre = "Raul Sanchez";
        echo "Instancia del objeto Usuario <br>";
    }

    public function __destruct()
    {
        echo "Destruyendo el objeto Usuario";
    }

    public function __toString()
    {
        return "Hola,{$this->nombre} <br>";        
    }
}

$user = new Usuario();
echo $user;
