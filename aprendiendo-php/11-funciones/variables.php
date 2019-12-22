<?php

//Varibles globales: fueras de las funciones.
//Variables locales: dentro de una función.

$var_global = 134;

function hola(){
    $var_local = 'Hola';
    echo $var_local;
}



//funciones variables.

function buenosDias(){
    return 'Buenos dias!!';
}

function buenasTardes(){
    return 'Que has comido!!';
}

function buenasNoches(){
    return 'A dormi!!!';
}

$horario = "buenasNoches";
echo $horario();

?>