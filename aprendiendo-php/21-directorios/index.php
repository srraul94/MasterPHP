<?php 

//Crear directorio
if(!is_dir('mi_carpeta')){
    mkdir('mi_carpeta',0777) or die ('error al crear directorio');
}
else{
    echo 'ya existe la carptea';
}

//Eliminar directorio
//rmdir('mi_carpeta');
echo'<br>';
if($gestor = opendir('./mi_carpeta')){
    while(false !==  ($archivo = readdir($gestor))){
        if($archivo != '.' && $archivo != '..')
        echo $archivo;
    } 
}


?>