<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pirámide de Mario</title>
</head>
<body>
    <h2>Construir Pirámide</h2>
    <form method="POST">
        Altura: <input type="number" name="altura" min="1" required>
        <input type="submit" value="Dibujar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["altura"])) {
        $altura = (int)$_POST["altura"];
        
        echo "<h3>Pirámide de altura $altura:</h3>";
        // Bucle externo: controla las filas (altura)
        for ($i = 1; $i <= $altura; $i++) {
            // Bucle interno: dibuja los asteriscos en cada fila
            for ($j = 1; $j <= $i; $j++) {
                echo "* ";  // Dibuja un asterisco seguido de espacio
            }
            echo "<br>";  // Salto de línea después de cada fila
        }
    }
    ?>
</body>
</html>