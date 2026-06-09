<?php

class Conexion {

    private $host = "localhost";
    private $usuario = "root";
    private $password = "";
    private $bd = "unidad1";

    public function conectar() {

        $conexion = new mysqli(
            $this->host,
            $this->usuario,
            $this->password,
            $this->bd
        );

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        return $conexion;
    }
}
?>