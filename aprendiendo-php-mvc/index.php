
<?php

require_once 'autoload.php';
//require_once 'controllers/NotaController.php';


if(isset($_GET['controller'])){
    $nom_controlador = $_GET['controller'].'Controller';
}
else{
    echo "la página que buscas no existe";
    exit();
}

if(class_exists($nom_controlador)){
    $controlador = new $nom_controlador;

    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
        $action = $_GET['action'];
        $controlador->$action();
    }
    else{
        echo "la acción que buscas no existe";
    }
}
else{
    echo "la página que buscas no existe";
}




