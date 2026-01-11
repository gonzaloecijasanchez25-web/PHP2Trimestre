<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Constructor de Pizzas</title>
</head>
<body>
    <h2>Construye tu Pizza</h2>
    <form method="POST">
        Tamaño:<br>
        <input type="radio" name="tamano" value="8" required> Pequeña (8€)<br>
        <input type="radio" name="tamano" value="10"> Mediana (10€)<br><br>
        Ingredientes (1€ cada uno):<br>
        <input type="checkbox" name="ingredientes[]" value="Jamón"> Jamón<br>
        <!-- Los corchetes [] en el name hacen que PHP reciba un array de ingredientes -->
        <input type="checkbox" name="ingredientes[]" value="Queso"> Queso<br>
        <input type="checkbox" name="ingredientes[]" value="Champiñones"> Champiñones<br><br>
        <input type="submit" value="Calcular Precio">
    </form>

    <?php
    // Procesa el pedido solo si se envió el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $precio_base = isset($_POST["tamano"]) ? (int)$_POST["tamano"] : 0;  // Precio según tamaño
        $ingredientes = isset($_POST["ingredientes"]) ? $_POST["ingredientes"] : [];  // Array de ingredientes
        $precio_ingredientes = count($ingredientes);  // Cada ingrediente suma 1€
        $total = $precio_base + $precio_ingredientes;

        echo "<h3>Resumen de tu pedido:</h3>";
        echo "<ul>";
        foreach ($ingredientes as $ing) {
            echo "<li>$ing</li>";  // Muestra cada ingrediente en una lista
        }
        echo "</ul>";
        echo "<h4>Precio total: $total €</h4>";  // Muestra el precio final
    }
    ?>
</body>
</html>