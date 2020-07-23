<?php

class condicion
{

    public $dbConfig;
    public $dbContext;

    function __construct()
    {
        $this->dbConfig = new config;
        $this->dbContext  = $this->dbConfig->conexion();
    }

    // Verificia si existen partidos y puestos activos
    public function verificarPyP()
    {
        $resultado = $this->dbContext->query('SELECT id FROM partida WHERE estado = 1 ');
        if ($resultado->num_rows > 0) {
            $partido = true;
        } else {
            $partido = false;
        }
        $resultado->close();

        $resultado = $this->dbContext->query('SELECT id FROM puesto WHERE estado = 1');
        if ($resultado->num_rows > 0) {
            $puesto = true;
        } else {
            $puesto = false;
        }
        $resultado->close();

        if ($partido == true && $puesto == true) {
            return true;
        } else {
            return false;
        }
    }

    // Verifica si existen almenos 1 eleccion activa
    public function verificarElecciones()
    {
        $resultado = $this->dbContext->query('SELECT id FROM eleccion WHERE estado = 1 ');
        if ($resultado->num_rows == 1) {
            return true;
        } else {
            return false;
        }
    }

    // Verifica si existen 2 o mas candidatos activos
    public function verificarCandidatos()
    {
        $resultado = $this->dbContext->query('SELECT id FROM candidato WHERE estado = 1 ');
        if ($resultado->num_rows >= 2) {
            return true;
        } else {
            return false;
        }
    }

    //Inactiva todos los candidatos de un puesto
    public function inactivarCandidatos($id)
    {
        if ($resultado = $this->dbContext->query('SELECT id FROM candidato WHERE `candidato`.`estado` = 1')) {
            $puestos = mysqli_fetch_all($resultado);
        }

        foreach ($puestos as $key => $value) {
            $resultado = $this->dbContext->prepare('UPDATE `candidato` SET `estado` = 0 WHERE `candidato`.`idpuesto` = ?');
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->close();
        }
    }

    //Inactiva todos los candidatos de un partido
    public function inactivarCandidatos2($id)
    {
        if ($resultado = $this->dbContext->query('SELECT id FROM candidato WHERE `candidato`.`estado` = 1')) {
            $puestos = mysqli_fetch_all($resultado);
        }

        foreach ($puestos as $key => $value) {
            $resultado = $this->dbContext->prepare('UPDATE `candidato` SET `estado` = 0 WHERE `candidato`.`idpartido` = ?');
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->close();
        }
    }
}
