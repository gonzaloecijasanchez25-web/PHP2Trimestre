<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Analizador de Temperaturas</title>
</head>
<body>
    <h2>Analizador de Temperaturas</h2>
    <form method="POST">
        Temperatura Día 1: <input type="number" name="temp[]" step="0.1" required><br>
        Temperatura Día 2: <input type="number" name="temp[]" step="0.1" required><br>
        Temperatura Día 3: <input type="number" name="temp[]" step="0.1" required><br>
        Temperatura Día 4: <input type="number" name="temp[]" step="0.1" required><br>
        Temperatura Día 5: <input type="number" name="temp[]" step="0.1" required><br>
        <!-- Los corchetes [] crean un array PHP automáticamente -->
        <input type="submit" value="Analizar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["temp"])) {
        $temps = $_POST["temp"];  // Recibe directamente un array con las temperaturas
        $media = array_sum($temps) / count($temps);  // Calcula el promedio
        $max = max($temps);  // Encuentra la temperatura máxima
        $min = min($temps);  // Encuentra la temperatura mínima
        
        echo "<h3>Resumen de la semana:</h3>";
        echo "Temperatura media: " . number_format($media, 2) . "°C<br>";  // Muestra con 2 decimales
        echo "Temperatura máxima: $max°C<br>";
        echo "Temperatura mínima: $min°C<br>"; 
    .,-.-  
    }
    ?>
</body>
</html>