<?php

class AdministradorDAO{
    private $idPersona;
    private $nombre;
    private $apellido;
    private $correo;
    private $clave;

    public function __construct($idPersona=null, $nombre=null, $apellido=null, $correo=null, $clave=null){
        $this -> idPersona = $idPersona;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
        $this -> correo = $correo;
        $this -> clave = $clave;
    }
    
    public function autenticar(){
        return "select idAdministrador
                from Administrador 
                where correo = '" . $this -> correo . "' and clave = '" . $this -> clave . "'";
    }
    
    public function consultar(){
        return "select nombre, apellido, correo
                from Administrador
                where idAdministrador = '" . $this -> idPersona . "'";
    }
}

?>