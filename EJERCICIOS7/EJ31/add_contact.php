<?php
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];

    if ($nombre != "" && $telefono != "") {
        $linea = $nombre . " | " . $telefono . "\n";
        file_put_contents("agenda.txt", $linea, FILE_APPEND);
        $mensaje = "Contacto guardado correctamente";
    } else {
        $mensaje = "Rellena todos los campos";
        file_put_contents("errores.log", "Error al guardar contacto\n", FILE_APPEND);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir contacto</title>
</head>
<body>

<h2>Añadir contacto</h2>

<form method="post">
    Nombre:<br>
    <input type="text" name="nombre"><br><br>

    Teléfono:<br>
    <input type="text" name="telefono"><br><br>

    <button type="submit">Guardar</button>
</form>

<p><?php echo $mensaje; ?></p>

<a href="index.php">Volver al menú</a>

</body>
</html>
