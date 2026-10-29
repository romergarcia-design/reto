
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = trim($_POST["nombre"] ?? "");
    $correo = trim($_POST["correo"] ?? "");
    $telefono = trim($_POST["telefono"] ?? "");
    $password = $_POST["password"] ?? "";
    $mensaje = trim($_POST["mensaje"] ?? "");

    if (
        empty($nombre) ||
        empty($correo) ||
        empty($telefono) ||
        empty($password) ||
        empty($mensaje)
    ) {
        die("Error: Todos los campos son obligatorios.");
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        die("Error: El correo no es válido.");
    }

    if (strlen($password) < 6) {
        die("Error: La contraseña debe tener mínimo 6 caracteres.");
    }

    $nombre = htmlspecialchars($nombre, ENT_QUOTES, "UTF-8");
    $correo = htmlspecialchars($correo, ENT_QUOTES, "UTF-8");
    $telefono = htmlspecialchars($telefono, ENT_QUOTES, "UTF-8");
    $mensaje = htmlspecialchars($mensaje, ENT_QUOTES, "UTF-8");

} else {
    header("Location: index.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="contenedor">

        <h1>¡Registro exitoso!</h1>

        <p>Los datos fueron recibidos correctamente.</p>

        <h3>Información registrada:</h3>

        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>

        <p><strong>Correo:</strong> <?php echo $correo; ?></p>

        <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>

        <p><strong>Mensaje:</strong> <?php echo $mensaje; ?></p>

        <a href="index.html">Volver al formulario</a>

    </div>

</body>
</html>
