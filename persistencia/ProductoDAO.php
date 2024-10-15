<?php
class ProductoDAO{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    
    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> precioCompra = $precioCompra;
        $this -> precioVenta = $precioVenta;
    }
    
    public function consultarTodos(){
        return "select idProducto, nombre, cantidad, precioCompra, precioVenta, Marca_idMarca 
                from Producto";
    }
    
    public function insert($id=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0, $idMarca=0, $idCategoria=0, $idAdministrador=0) {
        return "INSERT INTO Producto (idProducto, nombre, cantidad, precioCompra, precioVenta, Marca_idMarca, Categoria_idCategoria, Administrador_idAdministrador) 
        VALUES ($id, $nombre, $cantidad, $precioCompra, $precioVenta, $idMarca, $idCategoria, $idAdministrador)";

    }
    
}

?>