<?php

//Debugear
$nombre = 'Raul';
var_dump($nombre);
echo '<hr/>';
//Fechas
echo date('d-m-Y');
echo time();
echo '<hr/>';

//matemáticas
echo 'Raiz: ' .sqrt(10);
echo '<br/>';
echo 'Aleatorio: ' .rand(0,100);
echo '<br/>';
echo 'Numero Pi: ' .pi();
echo '<br/>';
echo 'redondeo: ' .round(3.124356);
echo '<br/>';

//Más definidas
echo '<hr/>';
echo gettype($nombre);
echo '<br/>';
if(is_string($nombre)){
    echo 'es un string';
}
echo '<br/>';
if(isset($nombre)){
    echo 'la variable nombre existe';
}
echo '<br/>';

//Eliminar espacios
$frase = ' asd ';
$frase = trim($frase);
echo $frase;
echo '<br/>';

//Eliminar variables / indices
$year = 2020;
unset($year);
var_dump($year);
echo '<br/>';

//Si esta vacia
$num1 = 123;
if(empty($num1)){
    echo 'Vacia';
    echo '<br/>';
}
else{
    echo 'no esta vacia';
    echo '<br/>';
}

//longitud de cadena
$cadena = '123456';
echo strlen($cadena);
echo '<br/>';

//Encontrar un caracter 
$fraseL = "La vida es mi vida";
echo strpos($fraseL,"La");
echo '<br/>';

//reemplazar palabras
$fraseL = str_replace("vida","moto",$fraseL);
echo $fraseL;
echo '<br/>';

//mayusculas y minusculas
echo strtoupper($fraseL);
echo '<br/>';
echo strtolower($frase);
?>

