<?php

require_once 'configuracion.php';

ConfiguracionStatic::setColor("Blue");
ConfiguracionStatic::setEntorno("localhost");
ConfiguracionStatic::setNewsletter(true);

echo ConfiguracionStatic::getColor() .'<br>';
echo ConfiguracionStatic::getEntorno().'<br>';
echo ConfiguracionStatic::getNewsletter().'<br>';


$config = new ConfiguracionStatic();
$config::$color = "RED";
echo $config::getColor().'<br>';
