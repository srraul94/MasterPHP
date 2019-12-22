<?php

require_once 'models/pedido.php';

class PedidoController
{
    public function hacer()
    {
        require_once 'views/pedido/hacer.php';
    }

    public function add(){
        if (isset($_SESSION['identity'])) {

            $usuario_id = $_SESSION['identity']->id;
            $provincia = isset($_POST['provincia']) ? $_POST['provincia'] : false;
            $localidad = isset($_POST['localidad']) ? $_POST['localidad'] : false;
            $direccion = isset($_POST['direccion']) ? $_POST['direccion'] : false;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            if ($provincia && $localidad && $direccion) {
                //guardar datos
                $pedido = new Pedido();
                $pedido->setProvincia($provincia);
                $pedido->setDireccion($direccion);
                $pedido->setLocalidad($localidad);
                $pedido->setUsuario_id((int)$usuario_id);
                $pedido->setCoste($coste);
                $pedido->setEstado('confirm');


                
                $save = $pedido->save();

                //guardar linea pedido
                $save_linea = $pedido->save_linea();
              
              
                if($save && $save_linea){
                    $_SESSION['pedido'] = 'complete';
                    
                }
                else{
                    $_SESSION['pedido'] = 'failed';
                    
                }
                
            }
            else{
                $_SESSION['pedido'] = 'failed';

            }

            header("Location:".base_url.'pedido/confirmado');

        } 
        else {
            //redirigir
            header("Location:".base_url);
        }
    }

    public function confirmado(){

        if(isset($_SESSION['identity'])){
            $identity =$_SESSION['identity'];
            $pedido = new Pedido();
            $pedido->setUsuario_id($identity->id);
            $pedido = $pedido->getPedidoByUser();
            $pedido_prod = new Pedido();
           
            $productos = $pedido_prod->getProductByPedido($pedido->id);
            
        }

        require_once 'views/pedido/confirmado.php';
    }

    public function misPedidos(){

        Utils::isIdentity();
        $pedido = new Pedido();
        $pedido->setUsuario_id($_SESSION['identity']->id);
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedido/mispedidos.php';
    }

    public function detalle(){
        Utils::isIdentity();

        if(isset($_GET['id'])){

            $pedido = new Pedido();
            $pedido->setId($_GET['id']);
            $pedido = $pedido->getPedido();

            $pedido_prod = new Pedido();
            $productos = $pedido_prod->getProductByPedido($_GET['id']);
            

            require_once 'views/pedido/detalle.php';
        }
        else{
            header('Location:'.base_url.'pedido/mispedidos');
        }

    }

    public function gestion(){
        Utils::isAdmin();
        $gestion = true;

        $pedido = new Pedido();
        $pedidos = $pedido->getAll();

        require_once 'views/pedido/mispedidos.php';

    }

    public function estado(){
        Utils::isAdmin();
        if(isset($_POST['pedido_id']) && isset($_POST['estado'])){
            //update del pedido
            $pedido = new Pedido();
            $pedido->setId($_POST['pedido_id']);
            $pedido->setEstado($_POST['estado']);
            $pedido->updateOne();

            header('Location:'.base_url.'pedido/detalle&id='.$_POST['pedido_id']);

        }
        else{
            header('Location:'.base_url);
        }

    }





}
