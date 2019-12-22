<?php

try{
    throw new Exception('Error lógica!');
}
catch(Exception $e){
    echo 'Ha habido un error : '.$e->getMessage();
}
