<?php


class Usuario {

    const URL_COMPLETA ="http://localhost";
    public $email;
    public $password;

    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        return $this->email = $email;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        return $this->password = $password;
    }
}

$usuario = new Usuario();
echo $usuario::URL_COMPLETA;
echo Usuario::URL_COMPLETA;

var_dump($usuario);
