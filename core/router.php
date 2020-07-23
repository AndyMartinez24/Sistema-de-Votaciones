<?php
include "db\config.php";
include "helper/archivo.php";
include "usuario\usuario.php";
include "puesto\puesto.php";
include "ciudadano\ciudadano.php";
include "partido\partido.php";
include "candidato\candidato.php";
include "eleccion/eleccion.php";
include "helper/condicion.php";

$clasesAdmin = array("candidato", "eleccion", "partido", "puesto", "ciudadano","usuario");

$clasesUser = array("usuario");

if (isset($_SESSION['usuario'])) {

    if (isset($_GET["clase"]) && isset($_GET["funcion"])) {

        $clase = $_GET["clase"];
        $clase = new $clase;

        if (isset($_GET["id"])) {
            $id = $_GET["id"];
        } else {
            $id = "";
        }

        if (in_array($_GET["clase"], $clasesAdmin)) {

            call_user_func_array(array($clase, $_GET["funcion"]), array($id));
        } elseif (in_array($_GET["clase"], $clasesUser)) {

            call_user_func_array(array($clase, $_GET["funcion"]), array($id));
        } else {
            echo '
            <script>
                alert("Tu tipo de usuario no puede ingresar aqui");
                window.location.assign("index.php"); 
            </script>';
        }
    } elseif ($_SESSION['usuario'] == "Administrador") {

        $admin = new eleccion();
        call_user_func(array($admin, "inicio"));
    } elseif ($_SESSION['usuario'] != "Administrador") {

        //$usuario = new ciudadano();
        //call_user_func(array($usuario, "inicio"));

    }
} else {
    header("location: core\usuario\paginas\loginUser.php");
}
