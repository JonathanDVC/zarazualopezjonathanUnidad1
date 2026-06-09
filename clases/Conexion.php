<?php

class Conexion {

    private $host = "sql113.infinityfree.com";
    private $usuario = "if0_42134991";
    private $password = "Sjzd9un8kG";
    private $bd = "if0_42134991_dwp8idgsb";

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