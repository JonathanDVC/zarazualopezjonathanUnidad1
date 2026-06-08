<?php

session_start();

require_once "clases/Usuario.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST["correo"]);
    $password = $_POST["password"];

    $usuario = new Usuario();

    if ($usuario->login($correo, $password)) {

        $_SESSION["usuario"] = $correo;

        header("Location: index.php");
        exit();

    } else {

        $mensaje = "Correo o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Iniciar Sesión</h2>

<form method="POST">

    <input
        type="email"
        name="correo"
        placeholder="Correo electrónico"
        required
    >

    <input
        type="password"
        name="password"
        placeholder="Contraseña"
        required
    >

    <button type="submit">
        Ingresar
    </button>

</form>

<?php
if (!empty($mensaje)) {
    echo "<p>$mensaje</p>";
}
?>

</body>
</html>