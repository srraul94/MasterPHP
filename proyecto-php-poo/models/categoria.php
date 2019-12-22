<?php


class Categoria {
    private $id;
    private $nombre;

    //Conexion db
    private $db;

    
    public function __construct(){
        $this->db = Database::connect();
    }


   
    public function getId() {
        return $this->id;
    }

    
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    
    public function getNombre(){
        
        return $this->nombre;
    }

    
    public function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
        return $this;
    }

    public function getCategorias(){
       $categorias =  $this->db->query("SELECT * FROM categorias;");
        return $categorias;
    }

    public function getCategoria(){
        $categoria =  $this->db->query("SELECT * FROM categorias WHERE id = {$this->id};");
         return $categoria->fetch_object();
     }


    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL,'{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result = true;
            return $result;
        }
    }
}



?>