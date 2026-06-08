<?php

require_once "Conexion.php";

class Usuario {

    private $conexion;

    public function __construct() {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function registrar($nombre, $correo, $password) {

        $correo = trim($correo);

        $consulta = $this->conexion->prepare(
            "SELECT id FROM usuarios WHERE correo = ?"
        );

        $consulta->bind_param("s", $correo);
        $consulta->execute();
        $resultado = $consulta->get_result();

        if ($resultado->num_rows > 0) {
            return "El correo ya existe";
        }

        $passwordHash = password_hash(
            $password,
            PASSWORD_DEFAULT
        );

        $insertar = $this->conexion->prepare(
            "INSERT INTO usuarios(nombre, correo, password)
             VALUES(?,?,?)"
        );

        $insertar->bind_param(
            "sss",
            $nombre,
            $correo,
            $passwordHash
        );

        if ($insertar->execute()) {
            return "Registro exitoso";
        }

        return "Error al registrar";
    }

    public function login($correo, $password) {

        $consulta = $this->conexion->prepare(
            "SELECT * FROM usuarios WHERE correo = ?"
        );

        $consulta->bind_param("s", $correo);
        $consulta->execute();

        $resultado = $consulta->get_result();

        if ($resultado->num_rows == 1) {

            $usuario = $resultado->fetch_assoc();

            if (
                password_verify(
                    $password,
                    $usuario['password']
                )
            ) {
                return true;
            }
        }

        return false;
    }
}
?>