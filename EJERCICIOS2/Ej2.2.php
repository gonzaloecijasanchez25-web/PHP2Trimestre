<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Tablas</title>
</head>
<body>
    <h2>Generar Tabla</h2>
    <form method="POST">
        Filas: <input type="number" name="filas" min="1" required><br>
        Columnas: <input type="number" name="columnas" min="1" required><br>
        <input type="submit" value="Generar Tabla">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["filas"]) && isset($_POST["columnas"])) {
        $filas = (int)$_POST["filas"];
        $columnas = (int)$_POST["columnas"];
        
        echo "<h3>Tabla de $filas x $columnas</h3>";
        echo "<table border='1' cellpadding='5'>";
        $contador = 1;
        for ($i = 1; $i <= $filas; $i++) {
            echo "<tr>";
            for ($j = 1; $j <= $columnas; $j++) {
                echo "<td>F$i C$j</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    ?>
</body>
</html>