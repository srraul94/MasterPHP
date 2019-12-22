<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

class CategoriaController
{

    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categoria();
        $categorias = $categoria->getCategorias();
        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(isset($_GET['id'])){
            
            //categoria
            $categoria = new Categoria();
            $categoria->setId($_GET['id']);
            $cat = $categoria->getCategoria();

            //productos
            $producto = new Producto();
            $producto->setCategoria_id($_GET['id']);
            $productos = $producto->getAllCategory();

        }
        require_once 'views/categoria/ver.php';

    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categoria/crear.php';
    }

    public function save(){
        Utils::isAdmin();

        if (isset($_POST) && $_POST['nombre']) {
            //guardar categoria
            $categoria = new Categoria();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }        
        header("Location:" . base_url . "categoria/index");
    }
}
