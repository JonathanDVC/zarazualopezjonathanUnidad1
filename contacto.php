<?php

require_once "clases/Contacto.php";

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $contacto = new Contacto();

    if (
        $contacto->guardarMensaje(
            $_POST["nombre"],
            $_POST["correo"],
            $_POST["mensaje"]
        )
    ) {
        $mensaje = "Mensaje enviado correctamente";
    } else {
        $mensaje = "Error al enviar mensaje";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contacto</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

<?php include 'menu.php'; ?>

<h2>Buzón de Contacto</h2>

<form method="POST">

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

<textarea
name="mensaje"
placeholder="Escribe tu mensaje"
required></textarea>

<button type="submit">
Enviar
</button>

</form>

<p><?php echo $mensaje; ?></p>

</body>
</html>