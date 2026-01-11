<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ordenador de Listas</title>
</head>
<body>
    <h2>Ordenar Números</h2>
    <form method="POST">
        Introduce números separados por comas: <input type="text" name="numeros" required>
        <input type="submit" value="Ordenar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["numeros"])) {
        $texto = $_POST["numeros"];
        $numeros = explode(",", $texto);  // Divide el texto en un array usando comas
        $numeros = array_map('trim', $numeros);  // Elimina espacios en blanco de cada número
        sort($numeros, SORT_NUMERIC);  // Ordena el array numéricamente
        
        echo "<h3>Números ordenados:</h3>";
        echo "<ol>";  // Lista ordenada HTML
        foreach ($numeros as $num) {
            echo "<li>$num</li>";  // Muestra cada número en un elemento de lista
        }
        echo "</ol>";
    }
    ?>
</body>
</html>