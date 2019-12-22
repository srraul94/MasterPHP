<?php

//Funciones


function muestraNombre(){
    echo 'Raul' .'<br/>';
    echo 'Juan' .'<br/>';
    echo 'Pedro' .'<br/>';
    echo 'Jose' .'<br/>';
}

function tabla($numero){
    echo 'Tabla del: '.$numero .'<br/>';
    for($i=0;$i <=10;$i++){
        echo $numero .' X '.$i .' = '.($numero*$i) .'<br/>';
    }
}

muestraNombre();
if(isset($_GET['numero'])){
    tabla($_GET['numero']);
}
else{
    echo 'No hay número' .'<br/>';
}


function operaciones($num1,$num2,$negrita = false){
    $suma = $num1 + $num2;
    $resta = $num1 - $num2;
    $multi = $num1 * $num2;
    $div = $num1 / $num2;

    if($negrita == true){
        echo '<h1>Soy un negrita!!</h1> <br/>';
    }

    echo ' La suma es:  '.($suma) .'<br/>';
    echo ' La resta es:  '.($resta) .'<br/>';
    echo ' La multiplicacion es:  '.($multi) .'<br/>';
    echo ' La divisioon es:  '.($div) .'<br/>';
}

function miNombre($nom,$ape){
    echo '<hr/>';
    operaciones(3,4);
    return $nom . ' ' .$ape;
    
}



echo miNombre('Raul','Sánchez');
operaciones(12,3,a);


?>