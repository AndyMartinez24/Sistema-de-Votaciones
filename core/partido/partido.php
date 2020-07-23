<?php
class partido
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
        if ($resultado = $this->dbContext->query('SELECT id, nombre, descripcion, estado FROM partida ORDER BY id DESC')) {
            $puestos = mysqli_fetch_all($resultado);
            $resultado->free();
        }
        $this->dbContext->close();
        require_once("core\partido\paginas\inicio.php");
    }

    public function crear()
    {
        if ($_POST) {

            if ($_POST['nombre'] != null) {

                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $logo = uniqid() . " " . $_FILES['foto']['name'];
                $estado = true;

                $resultado = $this->dbContext->prepare('INSERT INTO `partida` (`nombre`, `descripcion`, `logo`, `estado`) VALUES (?, ?, ?, ?)');
                $resultado->bind_param('sssi', $nombre, $descripcion, $logo, $estado);
                $resultado->execute();
                $resultado->close();

                if ($_FILES['foto']["name"] != null) {
                    $archivo = new archivo();
                    $archivo->subir_foto($logo);
                }

                echo '
                    <script>
                        alert("Accion realizada exitosamente");
                        window.location.assign("index.php?clase=partido&funcion=inicio"); 
                    </script>';
            } else {
                echo '
                <script>
                    alert("Debes colocar almenos un nombre y una cedula");
                </script>';
            }
        }
        require_once("core\partido\paginas\crear.php");
    }

    public function ver($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion, logo, estado  FROM partida WHERE id = ?')) {
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $descripcion, $logo, $estado);
            $resultado->fetch();
            $resultado->close();
        }
        require_once("core/partido/paginas/ver.php");
    }

    public function editar($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, descripcion, logo, estado  FROM partida WHERE id = ?')) {
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $descripcion, $logo, $estado);
            $resultado->fetch();
            $resultado->close();
        }

        if ($_POST) {

            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $nuevo_logo = uniqid() . " " . $_FILES['foto']['name'];
            $estado = $_POST['estado'];

            $resultado = $this->dbContext->prepare('UPDATE `partida` SET `nombre`= ?,  `descripcion` = ?,  `logo`= ?, `estado`= ? WHERE `partida`.`id` = ?');
            $resultado->bind_param('sssii', $nombre, $descripcion, $nuevo_logo, $estado, $id);
            $resultado->execute();
            $resultado->close();

            if ($_FILES['foto']["name"] != null) {

                if (file_exists("tools/img/" . $logo)) {
                    unlink("tools/img/" . $logo);
                }

                $archivo = new archivo();
                $archivo->subir_foto($nuevo_logo);
            }

            echo '
                <script>
                    alert("Accion realizada exitosamente");
                    window.location.assign("index.php?clase=partido&funcion=inicio"); 
                </script>';
        }

        require_once("core/partido/paginas/editar.php");
    }

    public function eliminar($id)
    {
        if ($_POST) {
            $resultado = $this->dbContext->prepare('UPDATE `partida` SET `estado` = 0 WHERE `partida`.`id` = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->close();

            $this->condicion->inactivarCandidatos2($id);

            
            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=partido&funcion=inicio"); 
            </script>';
        }
        require_once("core/partido/paginas/eliminar.php");
    }
}
