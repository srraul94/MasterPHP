<?php

class Database {
    public static function connect(){
        $db = new mysqli('localhost','root','root','tienda_master');
        $db->query("SET NAME 'utf-8'");

        return $db;
    }
}

