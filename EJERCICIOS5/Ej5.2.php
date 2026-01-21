<?php
$peliculas = [
    ["Título" => "Matrix", "Género" => "Acción", "Edad" => 16],
    ["Título" => "Toy Story", "Género" => "Animación", "Edad" => 0],
    ["Título" => "El Padrino", "Género" => "Drama", "Edad" => 18],
    ["Título" => "John Wick", "Género" => "Acción", "Edad" => 18],
    ["Título" => "Superbad", "Género" => "Comedia", "Edad" => 16],
];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["genero"])) {
    $generoBuscado = $_POST["genero"];
    $encontradas = [];
    
    foreach ($peliculas as $peli) {
        if ($peli["Género"] == $generoBuscado) {
            $encontradas[] = $peli;
        }
    }
    
    if (empty($encontradas)) {
        echo "<p>No hay resultados para $generoBuscado</p>";
    } else {
        foreach ($encontradas as $peli) {
            echo "<div style='border:1px solid #ccc; padding:10px; margin:5px;'>";
            echo "<b>" . $peli["Título"] . "</b><br>";
            echo "<i>" . $peli["Género"] . "</i><br>";
            echo "Edad: " . ($peli["Edad"] == 0 ? "Todos" : $peli["Edad"] . "+");
            echo "</div>";
        }
    }
}
?>

<form method="POST">
    Género: 
    <select name="genero">
        <option value="Acción">Acción</option>
        <option value="Comedia">Comedia</option>
        <option value="Drama">Drama</option>
        <option value="Animación">Animación</option>
    </select>
    <button>Buscar</button>
</form>