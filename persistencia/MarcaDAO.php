<?php
class MarcaDAO{
    private $idMarca;
    private $nombre;
    
    public function __construct($idMarca=0, $nombre=""){
        $this -> idMarca = $idMarca;
        $this -> nombre = $nombre;
    }
    
    public function consultarTodos(){
        return "select idMarca, nombre
                from Marca
                order by nombre asc";
    }
    
    public function consultar(){
        return "select nombre 
                from Marca
                where idMarca = '" . $this -> idMarca . "'";
    }
}

?>