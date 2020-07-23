<?php

class usuario
{
    public $dbConfig;
    public $dbContext;

    function __construct()
    {
        $this->dbConfig = new config;
        $this->dbContext  = $this->dbConfig->conexion();
    }
    
    public function iniciar_sesion($cedula)
    {

        if ($resultado = $this->dbContext->prepare('SELECT cedula, nombre, apellido  FROM ciudadano WHERE cedula = ? AND estado = 1')) {
            $resultado->bind_param('s', $cedula);
            $resultado->execute();
            $resultado->store_result();
            return $resultado;
        }else {
            return false;
        }
    }

    public function iniciar_sesion_admin($username, $pass)
    {
        if ($resultado = $this->dbContext->prepare('SELECT id FROM useradmin WHERE username = ? AND pass = ?')) {
            $resultado->bind_param('ss', $username,$pass);
            $resultado->execute();
            $resultado->store_result();
            return $resultado;
        }else {
            return false;
        }
    }

    public function cerrar_sesion()
    {
        session_start();
        session_destroy();
        header("location: index.php");
    }
}
