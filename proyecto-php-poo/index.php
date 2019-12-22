
<?php
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'views/layout/header.php';
require_once 'views/layout/sidebar.php';



function show_error(){
    $error = new ErrorController();
    $error->index();
}

if(isset($_GET['controller'])){
    $nom_controlador = $_GET['controller'].'Controller';
}
elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){
    $nom_controlador = controller_default;
}
else{
    $error = new ErrorController();
    $error->index();
    exit();
}

if(class_exists($nom_controlador)){
    $controlador = new $nom_controlador;

    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }
    elseif(!isset($_GET['controller']) && !isset($_GET['action']) ){
        $default = action_default;
        $controlador->$default();
    }
    else{
        show_error();
    }
}
else{
    show_error();
}

require_once 'views/layout/footer.php';





