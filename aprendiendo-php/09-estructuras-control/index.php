

<?php

//Bucle while
$i = 0 ;
while($i < 10){
    echo 'La i vale: '. $i . '<br/>';
    $i++;
}


//Do While

$j = 0;
do{
    echo 'La j vale: '. $j . '<br/>';
    $j++;
}while($j <= 10);


//Bucle For


for($i = 0; $i<= 10;$i++){
    echo 'La i vale: '. $i . '<br/>';
    
}

//break detiene cualquier bucle

for($i = 0; $i<= 10;$i++){
    echo 'La i vale: '. $i . '<br/>';
    if($i == 5){
        break;
    }
}
?>
