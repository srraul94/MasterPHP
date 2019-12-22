<?php

class Producto{
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    //Conexion db
    private $db;

    
    public function __construct(){
        $this->db = Database::connect();
    }

    public function save(){
        $sql = "INSERT INTO productos VALUES(NULL,'{$this->getCategoria_id()}','{$this->getNombre()}'".
        ",'{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},'',CURDATE(),'{$this->getImagen()}');";

        $save = $this->db->query($sql);

        var_dump($this->db->error); 
        

        $result = false;
        if($save){
            $result = true;
            return $result;
        }
    }

    public function edit(){
        $sql = "UPDATE  productos SET categoria_id = '{$this->getCategoria_id()}',nombre = '{$this->getNombre()}'".
        ",descripcion = '{$this->getDescripcion()}',precio = {$this->getPrecio()},stock = {$this->getStock()},imagen = '{$this->getImagen()}' WHERE id = {$this->getId()};";

        $save = $this->db->query($sql);

        var_dump($this->db->error); 

        $result = false;
        if($save){
            $result = true;
            return $result;
        }
    }

    public function delete(){
        $sql = "DELETE FROM productos WHERE id = {$this->id};";
        $delete = $this->db->query($sql);        

        $result = false;
        if($delete){
            $result = true;
            return $result;
        }
    }

    public function getProducto(){
        $producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()} ;");
        return $producto->fetch_object();
    }

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC;");
        return $productos;
    }

    public function getAllCategory(){
        $productos = $this->db->query("SELECT p.*,c.nombre as 'Categoria' FROM productos p INNER JOIN categorias c ON c.id = p.categoria_id WHERE p.categoria_id = {$this->getCategoria_id()} ORDER BY id DESC;");
        return $productos;
    }

    public function getRandom($limit){
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }
   

   
    public function getId(){
        return $this->id;
    }

    
    public function setId($id){
        $this->id = $id;

        return $this;
    }

    
    public function getNombre(){
        return $this->nombre;
    }

    
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
        return $this;
    }

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);

        return $this;
    }

    
    public function getPrecio()
    {
        return $this->precio;
    }

    
    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);

        return $this;
    }

    
    public function getStock()
    {
        return $this->stock;
    }

    
    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);

        return $this;
    }

    
    public function getOferta()
    {
        return $this->oferta;
    }

    
    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);

        return $this;
    }

   
    public function getFecha()
    {
        return $this->fecha;
    }

    
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    
    public function getImagen()
    {
        return $this->imagen;
    }

    
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }
}

?>