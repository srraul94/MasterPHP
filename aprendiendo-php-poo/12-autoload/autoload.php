<?php


function app_autoloader($class){
    require_once 'clases/MisClases/'.$class.'.php';
}

spl_autoload_register('app_autoloader');