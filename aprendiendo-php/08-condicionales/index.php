<?php



//IF

$color = 'rojo';

if ($color == 'rojo') {
    echo 'entro en el if' . '<br/>';
} else {
    echo 'nunca hago esto' . '<br/>';
}

//operadores de comparación
/* ==, ===, !=, <>, !==, <,> <=,>=
*/

$year = 2019;
if ($year == 2019) {
    echo 'Es 2019!!' . '<br/>';
} else {
    echo 'no es 2019' . '<br/>';
}


if ($year >= 2000) {
    echo 'Es XXI' . '<br/>';
} else {
    echo 'Es XX' . '<br/>';
}

if ($year > 2020) {
    echo 'Es 2020 o más' . '<br/>';
} else if ($year == 2019) {
    echo 'Es 2019' . '<br/>';
}


//Operadores lógicos
/**
 * && and
 * || or
 * ! not
 * and or
 */

if ($year >= 2000 && $year < 2020) {
    echo 'Esta en el intervalo' . '<br/>';
}


//switch

switch ($year) {
    case 2000:
        echo 'Soy el 2000' . '<br/>';
        break;
    case 2019:
        echo 'Soy el 2019' . '<br/>';
        break;
    case 2010:
        echo 'Soy el 2010' . '<br/>';
        break;
    default:
        echo 'Soy el 1999'. '<br/>';
        break;
}

//GOTO
goto marca;
echo '<h3>Instrucción 1</h3>';
echo '<h3>Instrucción 2</h3>';
echo '<h3>Instrucción 3</h3>';
marca:
    echo 'me he saltado las instrucciónes';

?>
