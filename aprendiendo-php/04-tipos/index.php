<?php

/*
Tipod de datos posibles en PHP
    - Entero: 99
    - Float: 34.1
    - Boolean : true,false
    - String : 'Hola!'
    - null, nulo
    - arrays
    - Objetos.
*/

//nunca deben empezar con un número una variable.
// ni signos reservados +,-,*,/

$numeroFloat = 4.3;
$entero = 100;
$texto = 'Perro';
//para obtener el tipo de dato

echo gettype($numeroFloat);
echo '<br/>';
echo gettype($entero);
echo '<br/>';
echo gettype($texto);

$nula;
echo gettype($nula);
gettype($nula);

echo '<br/>';

//salto de linea en los caracteres
$txt = "El perro se  llama $texto";
echo $txt;

//para poner comillas dobles dentro de texto se usa \"

//Debugear.
$mi_nombre = 'Raúl Sánchez';
var_dump($mi_nombre);




?>