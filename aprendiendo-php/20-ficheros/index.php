<?php

//Abrir archivo
$archivo = fopen('texto.txt','a+');

//leer contenido.
while(!feof($archivo)){
    $contenido = fgets($archivo);
    echo $contenido;
    echo '<br>';
}


//Escribir en archivo

fwrite($archivo,'Soy un texto escritm asmd ma,sd o por fwrite');


//cerrar archivo
fclose($rchivo);

//Copiar fichero
copy('texto.txt','texto-copiado.txt') or die ('Error al copiar fichero');

//Renombrar fichero
rename('texto-copiado.txt','fichero-renombrado.txt');

//eliminar fichero
unlink('fichero-renombrado.txt') or die('Error al borrar');


//Compobrar si existe fichero
if(file_exists('fichero-renombrado.txt')){
    echo 'SI EXISTE';
}else{
    echo ' NO EXISTE';
}

?>
