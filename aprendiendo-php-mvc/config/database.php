<?php

class database{
    public static function conectar(){
        $conexion = new mysqli("localhost","root","root","notas_master");
        $conexion->query("SET NAMES 'UTF-8'");

        return $conexion;
    }
}




?>