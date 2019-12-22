<?php

if (isset($_POST)) {

    require_once 'includes/conexion.php';

    //Recoger los valores de actualización. 
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;



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
    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_validado = true;
        echo 'El email es válido';
    } else {
        $email_validado  = false;
        $errores['email'] = "El email no es válido";
    }


    $guardar_usuario = false;
    if (count($errores) == 0) {
        $guardar_usuario = true;

        $usuario = $_SESSION['usuario'];

        //Comprobar que el email no existe
        $sql_email = "SELECT id, email FROM usuarios WHERE email = '$email'";
        $isset_email = mysqli_query($db, sql_email);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if ($isset_user['id'] == $usuario['id'] || empty($isset_user)) {
            //actualizr usuario en la bd
         
            $sql = "UPDATE usuarios SET " .
                "nombre = '$nombre', " .
                "apellidos = '$apellidos', " .
                "email = '$email' " .
                "WHERE ID = " . $usuario['id'];
            $guardar = mysqli_query($db, $sql);



            if ($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;

                $_SESSION['completado'] = "La actualizacion se ha realizado";
            } else {
                $_SESSION['errores']['general'] = "Error al actualizar al usuario en la BD!!";
            }
        } else {
            $_SESSION['errores']['general'] = "Ya existe ese email en la BD!!";
        }
    } 
    else {
        $_SESSION['errores'] = $errores;
    }

    header('Location: misDatos.php');
}
