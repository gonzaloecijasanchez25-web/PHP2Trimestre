<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conversor Universal</title>
</head>
<body>
    <h2>Conversor</h2>
    <form method="POST">
        Cantidad: <input type="number" name="cantidad" step="0.01" required><br>
        Conversión: 
        <select name="conversion">
            <option value="euros_dolares">Euros a Dólares</option>
            <option value="dolares_euros">Dólares a Euros</option>
            <option value="metros_pies">Metros a Pies</option>
            <option value="pies_metros">Pies a Metros</option>
        </select><br>
        <input type="submit" value="Convertir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cantidad"]) && isset($_POST["conversion"])) {
        $cantidad = (float)$_POST["cantidad"];
        $conversion = $_POST["conversion"];
        $resultado = 0;
        $texto = "";

        switch ($conversion) {
            case "euros_dolares":
                $resultado = $cantidad * 1.08;
                $texto = "$cantidad Euros equivalen a $resultado Dólares";
                break;
            case "dolares_euros":
                $resultado = $cantidad / 1.08;
                $texto = "$cantidad Dólares equivalen a $resultado Euros";
                break;
            case "metros_pies":
                $resultado = $cantidad * 3.28084;
                $texto = "$cantidad Metros equivalen a $resultado Pies";
                break;
            case "pies_metros":
                $resultado = $cantidad / 3.28084;
                $texto = "$cantidad Pies equivalen a $resultado Metros";
                break;
        }

        echo "<h3>$texto</h3>";
    }
    ?>
</body>
</html>