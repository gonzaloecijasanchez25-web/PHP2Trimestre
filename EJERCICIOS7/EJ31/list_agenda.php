<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista agenda</title>
</head>
<body>

<h2>Lista de contactos</h2>

<?php
if (file_exists("agenda.txt")) {
    $lineas = file("agenda.txt");

    echo "<table border='1'>";
    echo "<tr><th>Nombre</th><th>Teléfono</th></tr>";

    foreach ($lineas as $linea) {
        $datos = explode("|", $linea);
        echo "<tr>";
        echo "<td>" . $datos[0] . "</td>";
        echo "<td>" . $datos[1] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay contactos guardados";
    file_put_contents("errores.log", "No existe agenda.txt\n", FILE_APPEND);
}
?>

<br>
<a href="index.php">Volver al menú</a>

</body>
</html>
