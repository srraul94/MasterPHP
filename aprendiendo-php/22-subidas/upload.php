<?php


$archivo = $_FILES['archivo'];
$nombre_img = $archivo['name'];
$tipo_img = $archivo['type'];

if($tipo_img == 'image/jpg' || $tipo_img == 'image/jpeg' ||
    $tipo_img == 'image/png' || $tipo_img == 'image/gif'){

        if(!is_dir('images')){
            mkdir('images',0777);
        }
        move_uploaded_file($archivo['tmp_name'],'images/'.$nombre_img);
        echo '<h1>Imagen subida correctamente</h1>';
        header('Refresh: 5;URL=index.php ');

}
else{
    header('Refresh: 5;URL=index.php ');
    echo 'Sube una imágen correcta por favor';
}

?>