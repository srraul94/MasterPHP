<?php

$series = ['Zoo','Peaky Blinders','Undone','Perdidos'];

//ordenar
sort($series);
//ordenar inverso
asort($series);

//Añadir elementos al array.
$series[] = 'Pokemon';
array_push($series,'Digimon');

//eliminar el ultimo elemento
array_pop($series);
//eliminar uno concreto
unset($series[3]);

//elemento aleatorio del array
array_rand($series);


//Dar la vuelta al arrat
array_reverse($series);

//buscar en un array => devuelve el indice donde está.
array_search('Undone',$series);

//Contar elementos
count($series);
sizeof($series);




?>