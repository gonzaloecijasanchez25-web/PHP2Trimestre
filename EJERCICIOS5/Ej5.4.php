<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $objetivo = floatval($_POST["objetivo"]);
    $actual = floatval($_POST["actual"]);
    
    if ($objetivo > 0) {
        $porcentaje = round(($actual * 100) / $objetivo);
        if ($porcentaje > 100) $porcentaje = 100;
        
        echo "<h3>Progreso: $porcentaje%</h3>";
        echo "<div style='width:300px; height:30px; border:1px solid #000;'>";
        echo "<div style='width:$porcentaje%; height:100%; background-color:green; color:white; text-align:center;'>$porcentaje%</div>";
        echo "</div>";
        
        echo "<p>Fórmula: ($actual × 100) / $objetivo = $porcentaje%</p>";
    } else {
        echo "<p style='color:red;'>El objetivo debe ser mayor que 0</p>";
    }
}
?>

<form method="POST">
    Objetivo: <input type="number" name="objetivo" step="0.01"><br>
    Actual: <input type="number" name="actual" step="0.01"><br>
    <button>Calcular</button>
</form>