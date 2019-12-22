<?php

if(isset($_POST)){
    //conexion a la base de datos;
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;

    $errores = array();
    //validar los datos antes de guardarlos en la bd
    if (!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)) {
        $nombre_validado = true;
        echo 'El nombre es válido';
    } else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es válido";
    }


    if(count($errores) == 0){
         //insertar usuario en la bd
        $sql = "INSERT INTO categorias VALUES(null,'$nombre');";
        $guardar = mysqli_query($db,$sql);

        if($guardar){
            $_SESSION['completado'] = "El registro se ha realizado";
        }
        else{
            $_SESSION['errores']['general'] = "Error al guardar la categoria en la BD!!";
        }

    }
    else{
        $_SESSION['errores'] = $errores;
        
    }

    header('Location: index.php');
}
