<?php
class config
{
    public $localhost = "localhost";
    public $user = "root";
    public $pass = "";
    public $database = "sadvo";

    public function conexion()
    {
        // Crear conexión con la base de datos.
        $db = new mysqli($this->localhost, $this->user, $this->pass, $this->database);

        // Validar la conexión de base de datos.
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        return $db;
    }

    public function closeConnection()
    {
        mysqli_close($this->config::conexion());
    }
}
?>