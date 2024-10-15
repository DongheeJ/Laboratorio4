<?php
require_once ("./persistencia/Conexion.php");
require ("./persistencia/MarcaDAO.php");

class Marca{
    private $idMarca;
    private $nombre;

    public function getIdMarca() {
        return $this->idMarca;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setIdProducto($idMarca){
        $this->idMarca = $idMarca;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function __construct($idMarca=0, $nombre=""){
        $this -> idMarca = $idMarca;
        $this -> nombre = $nombre;
    }
    
    public function consultarTodos(){
        $marcas = array();
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $marcaDAO = new MarcaDAO();
        $conexion -> ejecutarConsulta($marcaDAO -> consultarTodos());
        while($registro = $conexion -> siguienteRegistro()){
            $marca = new Marca($registro[0], $registro[1]);
            array_push($marcas, $marca);
        }
        $conexion -> cerrarConexion();
        return $marcas;        
    }
    
    public function consultar(){
        $conexion = new Conexion();
        $conexion -> abrirConexion();
        $marcaDAO = new MarcaDAO($this -> idMarca);
        $conexion -> ejecutarConsulta($marcaDAO -> consultar());
        $registro = $conexion -> siguienteRegistro();
        $this -> nombre = $registro[0];
        $conexion -> cerrarConexion();
    }    
}

?>