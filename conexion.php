<?php
class conexion{
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basededatos;
    private $conexion;
    public function __construct(){
        $this->servidor="localhost";
        $this->usuario="root";
        $this->contrasena="";
        $this->basededatos="sublime_detalle";
    }
    function conectar(){
        $this->conexion=new mysqli($this->servidor,$this->usuario,$this->contrasena,
        $this->basededatos);
        $this->conexion->set_charset("utf8");
    }
    function cerrar(){
        $this->conexion->close();
    }
}
?>