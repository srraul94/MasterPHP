<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    if(!isset($_SESSION)){
        session_start();
    };
    

    //Recoger los valores del registro. 
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;


    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db,$_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['pass']) ? $_POST['pass'] : false;

    $errores = array();
    //validar los datos antes de guardarlos en la bd
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
        echo 'El nombre es válido';
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }

    //validación apellidos
    if (!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)) {
        $apellidos_validado = true;
        echo 'El apellidos es válido';
    } else {
        $apellidos_validado = false;
        $errores['apellidos'] = "El apellidos no es válido";
    }

    //validación email.
    if (!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
        echo 'El email es válido';
    } else {
        $email_validado  = false;
        $errores['email'] = "El email no es válido";
    }

    //validación pass.
    if (!empty($password)) {
        $password_validado = true;
        echo 'El password es válido';
    } else {
        $password_validado   = false;
        $errores['password'] = "El password está vacía";
    }

    $guardar_usuario = false;
    if(count($errores) == 0){
        $guardar_usuario = true;

        //cifrar la contraseña antes de guardarla.
        $password_segura = password_hash($password,PASSWORD_BCRYPT,['cost'=>4]);
        
         //insertar usuario en la bd
        $sql = "INSERT INTO usuarios VALUES(null,'$nombre','$apellidos','$email','$password_segura',CURDATE());";
        $guardar = mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha realizado";
        }
        else{
            $_SESSION['errores']['general'] = "Error al guardar al usuario en la BD!!";
        }

    }
    else{
        $_SESSION['errores'] = $errores;
        
    }

    header('Location: index.php');
}
