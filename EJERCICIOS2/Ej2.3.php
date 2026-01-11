<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lanzador de Dados</title>
    <style>
        .dado { 
            display: inline-block; 
            width: 50px; 
            height: 50px; 
            border: 2px solid black; 
            text-align: center; 
            line-height: 50px; 
            margin: 5px; 
            background: #f0f0f0; 
        }
    </style>
</head>
<body>
    <h2>Lanzar Dados</h2>
    <form method="POST">
        ¿Cuántos dados quieres lanzar? <input type="number" name="cantidad" min="1" required>
        <input type="submit" value="Lanzar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cantidad"])) {
        $cantidad = (int)$_POST["cantidad"];
        $suma = 0;
        
        echo "<h3>Resultado del lanzamiento:</h3>";
        for ($i = 0; $i < $cantidad; $i++) {
            $valor = rand(1, 6);
            $suma += $valor;
            echo "<div class='dado'>$valor</div>";
        }
        echo "<h4>Suma total: $suma</h4>";
    }
    ?>
</body>
</html>