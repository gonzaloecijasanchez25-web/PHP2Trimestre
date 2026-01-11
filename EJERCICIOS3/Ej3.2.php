<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Analizador de Texto</title>
</head>
<body>
    <h2>Analizador de Texto</h2>
    <form method="POST">
        <textarea name="texto" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Analizar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["texto"])) {
        $texto = $_POST["texto"];
        $caracteres = strlen($texto);  // Cuenta todos los caracteres
        $palabras = str_word_count($texto);  // Cuenta las palabras
        $reverso = strrev($texto);  // Invierte el texto
        $contienePHP = str_contains(strtolower($texto), "php");  // Busca "php" sin importar mayúsculas

        echo "<h3>Estadísticas del texto:</h3>";
        echo "Caracteres: $caracteres<br>";
        echo "Palabras: $palabras<br>";
        echo "Texto al revés: <pre>$reverso</pre><br>";
        // Muestra un mensaje diferente según si aparece "PHP" o no
        echo $contienePHP ? "✅ La palabra 'PHP' aparece en el texto." : "❌ La palabra 'PHP' no aparece.";
    }
    ?>
</body>
</html>