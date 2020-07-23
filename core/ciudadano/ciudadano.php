<?php

class ciudadano
{

    public $dbConfig;
    public $dbContext;

    function __construct()
    {
        $this->dbConfig = new config;
        $this->dbContext  = $this->dbConfig->conexion();
    }

    public function inicio()
    {
        if ($resultado = $this->dbContext->query('SELECT id, cedula, nombre, apellido, email, estado FROM ciudadano ORDER BY id DESC')) {
            $puestos = mysqli_fetch_all($resultado);
            $resultado->free();
        }
        $this->dbContext->close();
        require_once("core\ciudadano\paginas\inicio.php");
    }

    public function crear()
    {
        if ($_POST) {
            if ($_POST['nombre'] != null && $_POST['cedula'] != null) {

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $cedula = $_POST['cedula'];
                $email = $_POST['email'];
                $estado = true;

                $resultado = $this->dbContext->prepare('INSERT INTO `ciudadano` (`cedula`, `nombre`, `apellido`, `email`, `estado`) VALUES (?, ?, ?, ?, ?)');
                $resultado->bind_param('ssssi', $cedula, $nombre, $apellido, $email, $estado);
                $resultado->execute();
                $resultado->close();

                echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=ciudadano&funcion=inicio"); 
            </script>';
            } else {
                echo '
                <script>
                    alert("Debes colocar almenos un nombre y una cedula");
                </script>';
            }
        }
        require_once("core\ciudadano\paginas\crear.php");
    }

    public function ver($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT cedula, nombre, apellido, email, estado  FROM ciudadano WHERE id = ?')) {
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($cedula, $nombre, $apellido, $email, $estado);
            $resultado->fetch();
            $resultado->close();
        }
        require_once("core/ciudadano/paginas/ver.php");
    }

    public function editar($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT cedula, nombre, apellido, email, estado  FROM ciudadano WHERE id = ?')) {
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($cedula, $nombre, $apellido, $email, $estado);
            $resultado->fetch();
            $resultado->close();
        }

        if ($_POST) {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $estado = $_POST['estado'];

            $resultado = $this->dbContext->prepare('UPDATE `ciudadano` SET `nombre` = ?, `apellido` = ?, `email`= ?, `estado` = ? WHERE `ciudadano`.`id` = ?');
            $resultado->bind_param('sssii', $nombre, $apellido, $email, $estado,$id);
            $resultado->execute();
            $resultado->close();

            echo '
                <script>
                    alert("Accion realizada exitosamente");
                    window.location.assign("index.php?clase=ciudadano&funcion=inicio"); 
                </script>';
        }

        require_once("core/ciudadano/paginas/editar.php");
    }

    public function eliminar($id)
    {
        if ($_POST) {
            $resultado = $this->dbContext->prepare('UPDATE `ciudadano` SET `estado` = 0 WHERE `eleccion`.`id` = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->close();
            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=ciudadano&funcion=inicio"); 
            </script>';
        }
        require_once("core/ciudadano/paginas/eliminar.php");
    }
}
