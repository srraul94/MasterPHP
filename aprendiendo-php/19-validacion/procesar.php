<?php

$error = 'faltan valores';

if(!empty($_POST['nombre']) && !empty($_POST['apellidos']) &&
    !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['edad'])){
    $error = 'ok';

    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $contrasena = $_POST['password'];
    $email = $_POST['email'];
    $edad = (int) $_POST['edad'];

    //validar nombre
    if(!is_string($nombre) || preg_match("/[0-9]+/",$nombre)){
        $error = 'nombre';
    }
    //validar apellidos
    if(!is_string($apellidos) || preg_match("/[0-9]+/",$apellidos)){
        $error = 'apellidos';
    }

    if(!is_int($edad) || !filter_var($edad,FILTER_VALIDATE_INT)){
        $error = 'edad';
    }

    if(!is_string($email) || !filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = 'email';
    }

    if(!is_string($contrasena) || !strlen($contrasena)>5){
        $error = 'contrasena';
    }
   
}
else{
    $error = 'faltan valores';
}

if($error !== 'ok'){
    header("Location:index.php?error=$error");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  
    <title>Validación de formularios en PHP</title>
</head>
<body>
    <h1>Datos validados correctamente</h1>
    <?php if($error === 'ok'): ?>
        <p><?=$nombre?></p>
        <p><?=$apellidos?></p>
        <p><?=$contrasena?></p>
        <p><?=$email?></p>
        <p><?=$edad?></p>
    <?php endif;?>
</body>
</html>