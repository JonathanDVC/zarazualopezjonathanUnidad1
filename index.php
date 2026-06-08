<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<?php include 'menu.php'; ?>

<h1>Bienvenido a mi Sitio Web</h1>

<?php
if(isset($_SESSION["usuario"])) {
    echo "<h3>Sesión iniciada: " . $_SESSION["usuario"] . "</h3>";
}
?>

<p>
Proyecto de la Unidad 1 desarrollado con PHP,
MySQL, HTML, CSS y JavaScript.
</p>

<h2>Características</h2>

<ul>
    <li>Registro de usuarios</li>
    <li>Inicio de sesión</li>
    <li>Validación Frontend</li>
    <li>Validación Backend</li>
    <li>Validación humana</li>
    <li>Mapa del sitio</li>
    <li>Página de error</li>
</ul>

</body>
</html>