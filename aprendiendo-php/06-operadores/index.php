
<?php

//Operadores aritmeticos

$numero1 = 120;
$numero2 = 30;

echo 'Suma: '. ($numero1+$numero2).'<br/>';
echo 'Resta: '. ($numero1-$numero2).'<br/>';
echo 'Multiplicación: '. ($numero1*$numero2).'<br/>';
echo 'Division: '. ($numero1/$numero2).'<br/>';
echo 'Modulo: '. ($numero1%$numero2).'<br/>';


//Operadores de incremento y decremento.

$year = 2019;

//decremento
$year--;
echo $year;

//incremento
$year++;
echo $year;

//Pre decremento
--$year;
echo $year;

//pre incremento
++$year;
echo $year;

echo '<br/>';

//Operadores de asingación

//el igual =, += y -=, *= , /=

$edad = 34;

echo $edad. '<br/>';

$edad += 10;
echo $edad. '<br/>';

$edad -= 15;
echo $edad. '<br/>';

$edad *= 15;
echo $edad. '<br/>';

$edad /= 2;
echo $edad. '<br/>';

?>