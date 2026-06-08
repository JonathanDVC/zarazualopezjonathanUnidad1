<?php

require_once "Conexion.php";

class Contacto {

    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function guardarMensaje(
        $nombre,
        $correo,
        $mensaje
    ) {

        $consulta = $this->conexion->prepare(
            "INSERT INTO mensajes(nombre,correo,mensaje)
             VALUES(?,?,?)"
        );

        $consulta->bind_param(
            "sss",
            $nombre,
            $correo,
            $mensaje
        );

        return $consulta->execute();
    }
}
?>