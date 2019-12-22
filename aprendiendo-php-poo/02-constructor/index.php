<?php
require_once 'coche.php';

$coche = new Coche('Lila','Serie 3',180,250,'BMW',5);
$coche2 = new Coche('Azul','Canri',150,230,'Toyota',5);
$coche3 = new Coche('Rojo','TT RS',420,350,'Audi',2);
$coche4 = new Coche('Negro','Clase C',300,250,'Mercedes',5);

echo $coche->mostrarInfo($coche2);

?>