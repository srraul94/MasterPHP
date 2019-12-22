<?php
//Iniciar la sesion y la conexion
require_once 'includes/conexion.php';

//Recoger los datos del formulario
if(isset($_POST)){

    //Borrar error antiguo
    if(isset($_SESSION['error-login'])){
        session_unset();
    }

    //Datos del formulario
    $email = trim($_POST['email']);
    $password = $_POST['pass'];
}
//consulta para comprobar las credenciales del usuario.
$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$login = mysqli_query($db,$sql);

if($login && mysqli_num_rows($login) == 1){
    $usuario = mysqli_fetch_assoc($login);
    
    //Comprobar contraseña
    $verify = password_verify($password,$usuario['password']);

    if($verify){
        $_SESSION['usuario'] = $usuario;
    }
    else{
        $_SESSION['error-login'] = "Login incorrecto";
        var_dump($_SESSION['error-login']);
    }
}
else{
    $_SESSION['error-login'] = "Login incorrecto";
    var_dump($_SESSION['error-login']);

}

//Comprobar los datos recogidos //Cifrar


//Consulta a la base de datos

//Guardar los datos del usuario logeado.

//redirigir
header('Location: index.php');

?>