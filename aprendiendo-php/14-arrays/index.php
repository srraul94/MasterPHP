<?php

//Arrays

$peliculas = array('Batman','Lost','Origen');
$series = ['Peaky Blinders','Undone','Perdidos'];
echo $peliculas[2];
echo '<br>';
echo $series[0];

//For 

echo '<hr>';
for($i=0;$i <= count($peliculas);$i++){
    echo $peliculas[$i];
    echo '<br>';

}

echo '<hr>';
foreach($series as $serie){
    echo $serie;
    echo '<br>';
}

echo '<hr>';
//Arrays asociativos
$personas = array(
    'nombre' => 'Juan',
    'apellidos' => 'Lopez',
    'web' => 'www.google.es'
);

echo $personas['nombre'];

echo '<hr>';
//Arrays multidimensional

$contactos = array(
    array (
        'nombre' => 'Pepe',
        'email' => 'pepe@mail.com'
    ),
    array (
        'nombre' => 'Juan',
        'email' => 'juan@mail.com'
    ),
    array (
        'nombre' => 'Jose',
        'email' => 'jose@mail.com'
    )
);

echo $contactos[0]['email'];

echo '<hr>';
foreach ($contactos as $key => $persona) {
    echo $persona['email'];
    echo '<br>';
}

echo '<hr>';
//FUNCIONES PARA ARRAYS.





?>