<?php

class candidato
{

    public $dbConfig;
    public $dbContext;
    public $condicion;

    function __construct()
    {
        $this->dbConfig = new config;
        $this->dbContext  = $this->dbConfig->conexion();
        $this->condicion = new condicion();
    }

    public function inicio()
    {
        if ($resultado = $this->dbContext->query('SELECT id, nombre, apellido, estado FROM candidato ORDER BY id DESC')) {
            $puestos = mysqli_fetch_all($resultado);
            $resultado->free();
        }
        $this->dbContext->close();
        require_once("core\candidato\paginas\inicio.php");
    }

    public function crear()
    {
        $verificar = $this->condicion->verificarPyP();

        if ($verificar != true) {
            echo '
            <script>
                alert("No existen al menos un partido y un puesto electivo activos para porder crear");
                window.location.assign("index.php?clase=candidato&funcion=inicio"); 
            </script>';
        }


        if ($_POST) {

            if ($_POST['nombre'] != null) {

                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $foto = uniqid() . " " . $_FILES['foto']['name'];
                $idpartido = $_POST['idpartido'];
                $idpuesto = $_POST['idpuesto'];
                $estado = true;

                $resultado = $this->dbContext->prepare('INSERT INTO `candidato` (`nombre`, `apellido`,`idpartido`,`idpuesto`, `foto`, `estado`) VALUES (?, ?,?,?, ?, ?)');
                $resultado->bind_param('ssiisi', $nombre, $apellido, $idpartido, $idpuesto, $foto, $estado);
                $resultado->execute();
                $resultado->close();

                if ($_FILES['foto']["name"] != null) {
                    $archivo = new archivo();
                    $archivo->subir_foto($foto);
                }

                echo '
                    <script>
                        alert("Accion realizada exitosamente");
                        window.location.assign("index.php?clase=candidato&funcion=inicio"); 
                    </script>';
            } else {
                echo '
                <script>
                    alert("Debes colocar almenos un nombre");
                </script>';
            }
        }
        require_once("core\candidato\paginas\crear.php");
    }

    public function ver($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, apellido,idpartido,idpuesto, foto, estado  FROM candidato WHERE id = ?')) {
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $apellido, $idpartido, $idpuesto, $foto, $estado);
            $resultado->fetch();
            $resultado->close();
        }
        require_once("core/candidato/paginas/ver.php");
    }

    public function editar($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, apellido,idpartido,idpuesto, foto, estado  FROM candidato WHERE id = ?')) {
            $resultado->bind_param('i', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $apellido, $idpartido, $idpuesto, $foto, $estado);
            $resultado->fetch();
            $resultado->close();
        }

        if ($_POST) {

            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $foto_nueva = uniqid() . " " . $_FILES['foto']['name'];
            $idpartido = $_POST['idpartido'];
            $idpuesto = $_POST['idpuesto'];
            $estado = $_POST['estado'];

            $resultado = $this->dbContext->prepare('UPDATE `candidato` SET `nombre` = ?, `apellido` = ?,`idpartido` = ?,`idpuesto` = ?, `foto` = ?, `estado` = ?  WHERE `candidato`.`id` = ?');
            $resultado->bind_param('ssiisii', $nombre, $apellido, $idpartido, $idpuesto, $foto_nueva, $estado,$id);
            $resultado->execute();
            $resultado->close();

            if ($_FILES['foto']["name"] != null) {

                if (file_exists("tools/img/" . $foto)) {
                    unlink("tools/img/" . $foto);
                }

                $archivo = new archivo();
                $archivo->subir_foto($foto_nueva);
            }

            echo '
                <script>
                    alert("Accion realizada exitosamente");
                    window.location.assign("index.php?clase=candidato&funcion=inicio"); 
                </script>';
        }

        require_once("core/candidato/paginas/editar.php");
    }

    public function eliminar($id)
    {
        if ($_POST) {
            $resultado = $this->dbContext->prepare('UPDATE `candidato` SET `estado` = 0 WHERE `candidato`.`id` = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->close();
            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=candidato&funcion=inicio"); 
            </script>';
        }
        require_once("core/candidato/paginas/eliminar.php");
    }
}
