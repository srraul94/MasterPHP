<?php
//Conexión
$servidor = 'localhost';
$usuario = 'root';
$password = 'root';
$baseDeDatos = 'blog_master';

$db = mysqli_connect($servidor,$usuario,$password,$baseDeDatos);
mysqli_query($db,"SET NAMES 'UTF-8'");


//Iniciar una sesión
if(!isset($_SESSION)){
    session_start();
}



?>