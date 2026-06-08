<?php

require_once "clases/Usuario.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST["captcha"] != 8) {

        $mensaje = "Validación humana incorrecta";

    } else {

        $usuario = new Usuario();

        $mensaje = $usuario->registrar(
            $_POST["nombre"],
            $_POST["correo"],
            $_POST["password"]
        );
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registro</title>
<link rel="stylesheet" href="css/estilos.css">
<script src="js/validaciones.js"></script>
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Registro</h2>

<form method="POST" onsubmit="return validarRegistro()">

<input
type="text"
name="nombre"
placeholder="Nombre"
required>

<input
type="email"
name="correo"
placeholder="Correo"
required>

<input
type="password"
id="password"
name="password"
placeholder="Contraseña"
required>

<label>¿Cuánto es 5 + 3?</label>

<input
type="number"
name="captcha"
required>

<button type="submit">
Registrar
</button>

</form>

<p><?php echo $mensaje; ?></p>

</body>
</html>