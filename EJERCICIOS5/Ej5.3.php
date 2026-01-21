<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["texto"])) {
    $texto = $_POST["texto"];
    
    // Diccionario de sustitución
    $buscar = ['A', 'E', 'I', 'O', 'S', 'a', 'e', 'i', 'o', 's'];
    $reemplazar = ['4', '3', '1', '0', '5', '4', '3', '1', '0', '5'];
    
    $hackeado = str_ireplace($buscar, $reemplazar, $texto);
    
    echo "<h3>Resultado:</h3>";
    echo "Original: $texto<br>";
    echo "Hackeado: <b>$hackeado</b>";
}
?>

<form method="POST">
    <textarea name="texto" rows="4" cols="50">Hola estudiantes de PHP</textarea><br>
    <button>Hackear</button>
</form>

<p>Sustituciones: A→4, E→3, I→1, O→0, S→5</p>