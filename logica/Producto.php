<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/ProductoDAO.php");

class Producto{
    private $idProducto;
    private $nombre;
    private $cantidad;
    private $precioCompra;
    private $precioVenta;
    private $marca;
    private $categoria;
    private $admininstrador;
    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecioCompra () {
        return $this->precioCompra;
    }

    public function getPrecioVenta () {
        return $this->precioVenta;
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setCantidad($cantidad){
        $this->cantidad = $cantidad;
    }

    public function setPrecioCompra($precioCompra){
        $this->precioCompra = $precioCompra;
    }

    public function setPrecioVenta($precioVenta){
        $this->precioVenta = $precioVenta;
    }
    
    public function __construct($idProducto=0, $nombre="", $cantidad=0, $precioCompra=0, $precioVenta=0, $marca=null, $categoria=null, $admininstrador=null){
        $this -> idProducto = $idProducto;
        $this -> nombre = $nombre;
        $this -> cantidad = $cantidad;
        $this -> precioCompra = $precioCompra;
        $this -> precioVenta = $precioVenta;
        $this -> marca = $marca;
        $this -> categoria = $categoria;
        $this -> admininstrador = $admininstrador;
    }
    
    public function consultarTodos(){
        $marcas = array();
        $productos = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        $conexion -> ejecutarConsulta($productoDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $marca = null;
            if(array_key_exists($registro[5], $marcas)){
                $marca = $marcas[$registro[5]];
            }else{
                $marca = new Marca($registro[5]);
                $marca -> consultar();
                $marcas[$registro[5]] = $marca;
            }
            $producto = new Producto($registro[0], $registro[1], $registro[2], $registro[3], $registro[4], $marca);
            array_push($productos, $producto);
        }
        $conexion -> cerrarConexion();
        return $productos;        
    }

    public function insertar($idProducto=0,$nombre="",$cantidad=0,$precioCompra=0,$precioVenta=0,$idMarca=0,$idCategoria=0,$idAdministrador=0){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $productoDAO = new ProductoDAO();
        
        try {
            $query = $productoDAO->insert( $idProducto, $nombre, $cantidad, $precioCompra, $precioVenta, $idMarca, $idCategoria, $idAdministrador);
            $conexion->ejecutarConsulta($query);
            echo "Consulta ejecutada correctamente.";
        } catch (Exception $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        }
        
        $conexion -> cerrarConexion();
    }
}

?>