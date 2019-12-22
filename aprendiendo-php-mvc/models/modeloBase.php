

<?php

require_once 'config/database.php';

class ModeloBase {

    public $db;

    public function __construct(){
        $this->db = database::conectar();

    }

    public function conseguirTodos($tabla){
        $sql = "SELECT * FROM $tabla ORDER BY id DESC";
        $query = $this->db->query($sql);
        return $query;
    }
}