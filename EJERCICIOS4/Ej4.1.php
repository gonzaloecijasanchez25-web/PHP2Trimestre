<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Máquina de Cambio</title>
</head>
<body>

<form method="post">
    <label>Cantidad en euros:</label>
    <input type="number" name="cantidad" min="0" required>
    <button type="submit">Calcular</button>
</form>

<?php
if (isset($_POST['cantidad'])) {
    $cantidad = (int) $_POST['cantidad'];

    $billetes = [50, 20, 10, 5, 1];
    $resultado = [];

    foreach ($billetes as $valor) {
        $resultado[$valor] = floor($cantidad / $valor);
        $cantidad = $cantidad % $valor;
    }

    echo "Para la cantidad introducida necesitas: ";
    echo $resultado[50] . " de 50€, ";
    echo $resultado[20] . " de 20€, ";
    echo $resultado[10] . " de 10€, ";
    echo $resultado[5] . " de 5€ y ";
    echo $resultado[1] . " monedas de 1€.";
}
?>

</body>
</html>
