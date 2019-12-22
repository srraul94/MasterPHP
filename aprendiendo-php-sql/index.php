<?php 

//conectar a la base de datos
//$conexion = mysqli_connect($host,$user,$password,$database);
$conexion = mysqli_connect('localhost','root','root','php-mysql');


//Comprobar la conexion
if(mysqli_connect_errno()){
    echo 'La conexión no se ha realizado correctamente'.mysqli_connect_errno();
}
else{
    echo 'La conexión  se ha realizado correctamente!!';
}

//consulta para configurar la codificacion de caracteres
//mysqli_query($link,$query);
mysqli_query($conexion,"SET NAMES 'UTF-8' ");

//CONSULTA SELECT DESDE PHP
$query = mysqli_query($conexion,"SELECT * FROM notas");

while($notas = mysqli_fetch_assoc($query)){
    var_dump($notas);
}

//Para insertar un dato en la BD
$sql = "INSERT INTO notas VALUES(NULL,'Titulo desde PHP','Descripcion papumio','blue')";
$queryInsert = mysqli_query($conexion,$sql);

if($queryInsert){
    echo 'La inserción se ha insertado correctamente';
}
else{
    echo 'La inserción ha fallado :(';
}

?>