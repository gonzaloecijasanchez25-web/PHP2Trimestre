<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora IMC</title>
    <style>
        .bajo { color: orange; }      /* Color para peso bajo */
        .normal { color: green; }     /* Color para peso normal */
        .sobrepeso { color: red; }    /* Color para sobrepeso */
    </style>
</head>
<body>
    <h2>Calculadora de IMC</h2>
    <form method="POST">
        Peso (kg): <input type="number" name="peso" step="0.1" required><br>
        Altura (cm): <input type="number" name="altura" step="0.1" required><br>
        <input type="submit" value="Calcular IMC">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $peso = (float)$_POST["peso"];
        $altura = (float)$_POST["altura"] / 100;  // Convierte cm a metros (1m = 100cm)
        $imc = $peso / ($altura * $altura);  // Fórmula del IMC: peso / altura²
        $clase = "";
        $mensaje = "";

        // Determina la categoría del IMC y asigna clase CSS correspondiente
        if ($imc < 18.5) {
            $clase = "bajo";
            $mensaje = "Bajo peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            $clase = "normal";
            $mensaje = "Peso normal";
        } else {
            $clase = "sobrepeso";
            $mensaje = "Sobrepeso";
        }

        // Muestra el resultado con el color correspondiente
        echo "<h3 class='$clase'>Tu IMC es: " . number_format($imc, 2) . " - $mensaje</h3>";
    }
    ?>
</body>
</html>