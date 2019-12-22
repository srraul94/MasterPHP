<?php


/*
Para mostrar el valor de la cookies tengo que usar
$_COOKIE, variable super global. array asociativo.
*/

if(isset($_COOKIE['miCookie'])){
    echo '<h1>'.$_COOKIE['miCookie'].'</h1>';
}
else{
    echo 'no existe la cookie';
}

if(isset($_COOKIE['unyear'])){
    echo '<h1>'.$_COOKIE['unyear'].'</h1>';
}
else{
    echo 'no existe la cookie';
}

?>

<a href="crearCookie.php">Crear Cookies</a>
<a href="borrarCookie.php">Borrar Cookie</a>