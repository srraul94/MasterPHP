

<?php

require_once '../vendor/autoload.php';

//Conexion a la db
$conexion = new mysqli("localhost","root","root","notas_master");
$conexion->query("SET NAMES 'utf-8'");

//consulta elementos a paginar
$consulta = $conexion->query("SELECT * FROM notas");
$num_elementos = $consulta->num_rows;
$numeroElXPagina = 2;

//Hacer paginacion
$pagination = new Zebra_Pagination();

//Numero de elmentos a paginar
$pagination->records($num_elementos);

//Numero de elementos por pagina
echo'<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';


$pagination->records_per_page($numeroElXPagina);

$page = $pagination->get_page();
$operation = (($page - 1)*$numeroElXPagina);
$notas = $conexion->query("SELECT * FROM notas LIMIT $operation,$numeroElXPagina;");

while($nota = $notas->fetch_object()){
    echo "<h1>{$nota->titulo}</h1>";
    echo "<h2>{$nota->descripcion}</h2> <hr>";
}

$pagination->render();


?>