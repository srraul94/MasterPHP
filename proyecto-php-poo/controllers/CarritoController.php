<?php

require_once 'models/producto.php';

class CarritoController
{
    public function index()
    {
      if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) >= 1){
        $carrito = $_SESSION['carrito'];
      }
      else{
        $carrito = array();
      }
       
     require_once 'views/carrito/index.php';
    }

    public function add() {
       
        if (isset($_GET['id'])) {
            $producto_id = $_GET['id'];
        } else {
            header("Location: " .base_url);
        }

        if (isset($_SESSION['carrito'])) {
            $contador = 0;
            foreach ($_SESSION['carrito'] as $indice => $elemento) {
                if ($elemento['id_producto'] == $producto_id) {
                    $_SESSION['carrito'][$indice]['unidades']++;
                    $contador++;
                }
            }
        }

        if (!isset($contador) || $contador == 0) {

            //conseguir producto
            $producto = new Producto();
            $producto->setId($producto_id);
            $pro = $producto->getProducto();


            //Añadir al carrito
            if (is_object($pro)) {
                
                $_SESSION['carrito'][] = array(
                    'id_producto' => $pro->id,
                    'precio' => $pro->precio,
                    'unidades' => 1,
                    'producto' => $pro
                );
            }
        }

       

        header("Location:".base_url."carrito/index");
    }

    public function remove(){
        if(isset($_GET['index'])){
            unset($_SESSION['carrito'][$_GET['index']]);
            header("Location:".base_url."carrito/index");
        }
    }

    public function up(){
        if(isset($_GET['index'])){
            $_SESSION['carrito'][$_GET['index']]['unidades']++;
            header("Location:".base_url."carrito/index");
        }
    }

    public function down(){
        if(isset($_GET['index'])){
            $_SESSION['carrito'][$_GET['index']]['unidades']--;
            if( $_SESSION['carrito'][$_GET['index']]['unidades'] == 0){
                unset($_SESSION['carrito'][$_GET['index']]);
            }
            header("Location:".base_url."carrito/index");
        }
    }

    public function delete_all()
    {
        unset($_SESSION['carrito']);
    }
}
