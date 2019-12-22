<?php

/*
Fichoer que se almacena en el ordenador del usuario que vista la web
con le objetivo de recordar datos o rastrear el comportamiento del mismo.
*/

//crear cookies

//setcookie('nombre','valor solo texto',caducidad,ruta,dominio);

//Cookie básica.
setcookie('miCookie','valor de cookie');

//Cookie con expiración
setcookie('unyear','valor de 365 dias',time()+(60*60*24*365));

?>

<a href="ver_cookies.php">Ver Cookies</a>
<a href="borrarCookie.php">Borrar Cookie</a>