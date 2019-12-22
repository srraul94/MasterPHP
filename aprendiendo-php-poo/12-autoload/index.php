<?php


require_once 'autoload.php';
//require_once 'clases/usuario.php';
//require_once 'clases/categoria.php';
//require_once 'clases/entrada.php';

/*$user = new Usuario();
echo $user->nombre;
echo '<br>';
echo $user->email;

$categoria = new Categoria();
echo '<br>';
echo $categoria->nombre;
echo '<br>';
echo $categoria->descripcion;
*/

use MisClases\Categoria;
use MisClases\Entrada;
use MisClases\Usuario;


//Espacios de nombre y paquetes
class Principal {
    public $usuario;
    public $categoria;
    public $entrada;

    public function __construct()
    {
       $this->usuario = new MisClases\Usuario();
    }
}

$principal = new Principal();
var_dump($principal);