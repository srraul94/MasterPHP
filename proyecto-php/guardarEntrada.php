<?php

if(isset($_POST)){
    //conexion a la base de datos;
    require_once 'includes/conexion.php';

    $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db,$_POST['titulo']) : false;
    $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db,$_POST['descripcion']) : false;
    $categoria = isset($_POST['categoria']) ? (int) $_POST['categoria'] : false;
    $usuario = $_SESSION['usuario']['id'];


    $errores = array();
    //validar los datos antes de guardarlos en la bd
    if (!empty($titulo)) {
        $titulo_validado = true;
        echo 'El titulo es válido';
    } else {
        $titulo_validado = false;
        $errores['titulo'] = "El titulo no es válido";
    }

    if (!empty($descripcion)) {
        $descripcion_validada = true;
        echo 'La descripcion es válida';
    } else {
        $descripcion_validada = false;
        $errores['descripcion'] = "La descripcion no es válida";
    }

    if (!empty($categoria) && is_numeric($categoria)) {
        $categoria_validada = true;
        echo 'La categoria es válida';
    } else {
        $categoria_validada = false;
        $errores['categoria'] = "La categoria no es válida";
    }
    
   
    if(count($errores) == 0){
        if(isset($_GET['editar'])){
            $entrada_id = $_GET['editar'];
            $usuario_id = $_SESSION['usuario']['id'];
            $sql = "UPDATE entradas SET titulo='$titulo',descripcion='$descripcion', categoria_id=$categoria ".
            "WHERE id = $entrada_id AND usuario_id = $usuario_id;";
        }
        else{
            //insertar usuario en la bd
            $sql = "INSERT INTO entradas VALUES(null,$usuario,$categoria,'$titulo','$descripcion',CURDATE());";
        }
       $guardar = mysqli_query($db,$sql);

        header('Location: index.php');

    }
    else{
        $_SESSION['errores_entrada'] = $errores;
       
        if(isset($_GET['editar'])){
            header("Location: editarEntrada.php?id=".$_GET['editar']);
        }
        else{
            header('Location: crearEntrada.php');
        }
        
    }

}
