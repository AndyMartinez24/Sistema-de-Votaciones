<?php


class puesto
{

    public $dbConfig;
    public $dbContext;

    function __construct()
    {
        $this->dbConfig = new config;
        $this->dbContext  = $this->dbConfig->conexion();
        $this->condicion = new condicion();
    }

    public function inicio()
    {
        if ($resultado = $this->dbContext->query('SELECT id, nombre, descripcion, estado FROM puesto ORDER BY id DESC')) {
            $puestos = mysqli_fetch_all($resultado);
            $resultado->free();
        }
        $this->dbContext->close();
        require_once("core\puesto\paginas\inicio.php");
    }

    public function crear()
    {
        if ($_POST) {

            if ($_POST['nombre'] != null && $_POST['descripcion'] != null) {

                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $estado = true;

                $resultado = $this->dbContext->prepare('INSERT INTO `puesto` (`nombre`, `descripcion`, `estado`) VALUES (?, ?, ?)');
                $resultado->bind_param('ssi', $nombre, $descripcion, $estado);
                $resultado->execute();
                $resultado->close();

                echo '
                <script>
                    alert("Accion realizada exitosamente");
                    window.location.assign("index.php?clase=puesto&funcion=inicio"); 
                </script>';
            } else {
                echo '
                <script>
                    alert("Debes completar los datos");
                </script>';
            }
        }
        require_once("core\puesto\paginas\crear.php");
    }

    public function ver($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion, estado  FROM puesto WHERE id = ?')) {
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $descripcion, $estado);
            $resultado->fetch();
            $resultado->close();
        }
        require_once("core/puesto/paginas/ver.php");
    }

    public function editar($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion, estado  FROM puesto WHERE id = ?')) {
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $descripcion, $estado);
            $resultado->fetch();
            $resultado->close();
        }

        if ($_POST) {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $estado = $_POST['estado'];

            $resultado = $this->dbContext->prepare('UPDATE `puesto` SET `nombre` = ?, `descripcion` = ?, `estado` = ? WHERE `puesto`.`id` = ?');
            $resultado->bind_param('ssis', $nombre, $descripcion, $estado, $id);
            $resultado->execute();
            $resultado->close();

            echo '
        <script>
            alert("Accion realizada exitosamente");
            window.location.assign("index.php?clase=puesto&funcion=inicio"); 
        </script>';
        }

        require_once("core/puesto/paginas/editar.php");
    }

    public function eliminar($id)
    {
        if ($_POST) {
            $resultado = $this->dbContext->prepare('UPDATE `puesto` SET `estado` = 0 WHERE `puesto`.`id` = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->close();

            $this->condicion->inactivarCandidatos($id);

            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=puesto&funcion=inicio"); 
            </script>';
        }
        require_once("core/puesto/paginas/eliminar.php");
    }
}
