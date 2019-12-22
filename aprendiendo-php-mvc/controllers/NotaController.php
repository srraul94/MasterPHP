<?php

class NotaController{

    public function listar(){
        require_once 'models/nota.php';

        //Logica accion controlador
        $nota = new Nota();
        $notas = $nota->conseguirTodos('notas');

        //vista
        require_once 'views/notas/listar.php';

    }

    public function crear(){
        //Modelo
        require_once 'models/nota.php';
        $nota = new Nota();
        $nota->setUsuario_id(1);
        $nota->setTitulo("Nota desde PHP-MVC");
        $nota->setDescripcion("Descripcion de la nota!");
        $nota->guardar();

        header("Location: index.php?controller=Nota&action=listar");
    }

    public function borrar(){
        
    }
}


?>