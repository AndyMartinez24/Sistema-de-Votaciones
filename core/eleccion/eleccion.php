<?php


class eleccion
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
        $verificar = $this->condicion->verificarElecciones();

        if ($verificar == true) {
            if ($resultado = $this->dbContext->query('SELECT id, nombre, fecha_fin, estado FROM eleccion WHERE `eleccion`.`estado` = 1 ORDER BY id DESC')) {
                $puestos = mysqli_fetch_all($resultado);
                $resultado->free();
            }
        } else {
            if ($resultado = $this->dbContext->query('SELECT id, nombre, fecha_fin, estado FROM eleccion WHERE `eleccion`.`estado` = 0 ORDER BY id DESC')) {
                $puestos = mysqli_fetch_all($resultado);
                $resultado->free();
            }
        }
        $this->dbContext->close();
        require_once("core/eleccion/paginas/inicio.php");
    }

    public function ver($id)
    {
        if ($resultado = $this->dbContext->prepare('SELECT nombre, fecha_fin, estado  FROM eleccion WHERE id = ?')) {
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->store_result();
            $resultado->bind_result($nombre, $fecha_fin, $estado);
            $resultado->fetch();
            $resultado->close();
        }
        require_once("core/eleccion/paginas/resultados.php");
    }

    public function crear()
    {

        $verificar = $this->condicion->verificarCandidatos();

        if ($verificar != true) {
            echo '
            <script>
                alert("Deben existir almenos dos candidatos activos para porder crear una eleccion");
                window.location.assign("index.php?clase=eleccion&funcion=inicio"); 
            </script>';
        }

        if ($_POST) {

            if ($_POST['nombre'] != null && $_POST['fecha'] != null) {

                $nombre = $_POST['nombre'];
                $fecha = $_POST['fecha'];
                $estado = true;

                $resultado = $this->dbContext->prepare('INSERT INTO `eleccion` (`nombre`, `fecha_fin`, `estado`) VALUES (?, ?, ?)');
                $resultado->bind_param('ssi', $nombre, $fecha, $estado);
                $resultado->execute();
                $resultado->close();

                echo '
                <script>
                    alert("Accion realizada exitosamente");
                    window.location.assign("index.php?clase=eleccion&funcion=inicio"); 
                </script>';
            } else {
                echo '
                <script>
                    alert("Debes completar los datos");
                </script>';
            }
        }
        require_once("core/eleccion/paginas/crear.php");
    }

    public function eliminar($id)
    {
        if ($_POST) {
            $resultado = $this->dbContext->prepare('UPDATE `eleccion` SET `estado` = 0 WHERE `eleccion`.`id` = ?');
            $resultado->bind_param('s', $id);
            $resultado->execute();
            $resultado->close();
            echo '
            <script>
                alert("Accion realizada exitosamente");
                window.location.assign("index.php?clase=eleccion&funcion=inicio"); 
            </script>';
        }
        require_once("core/eleccion/paginas/eliminar.php");
    }
}
