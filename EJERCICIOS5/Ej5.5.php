<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = intval($_POST["cantidad"]);
    $rango = intval($_POST["rango"]);
    
    $numeros = [];
    while (count($numeros) < $cantidad) {
        $num = rand(1, $rango);
        if (!in_array($num, $numeros)) {
            $numeros[] = $num;
        }
    }
    
    sort($numeros);
    
    echo "<h3>Números: " . implode(" - ", $numeros) . "</h3>";
    echo "<p>Generados $cantidad números del 1 al $rango</p>";
}
?>

<form method="POST">
    Cantidad: <input type="number" name="cantidad" value="6"><br>
    Rango: <input type="number" name="rango" value="49"><br>
    <button>Generar</button>
</form>