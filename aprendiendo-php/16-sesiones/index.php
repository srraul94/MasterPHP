<?php

/*una sesion lo que hace es almacenar y persistir datos del usaurio
mientras que navega en un sitio web hasta que cierra sesion o cierra
el navegador */

// Iniciar la sesión
session_start();

//variable local.
$var_normal = "soy texto";

//Varible de sesión.
$_SESSION['variable_persistente'] = 'Soy una sesión activa';

echo $var_normal. '<br>';
echo $_SESSION['variable_persistente'];

?>