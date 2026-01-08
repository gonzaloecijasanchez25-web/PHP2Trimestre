<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Censor de Comentarios</title>
    <style>
        .comentario { border: 1px solid #ccc; padding: 10px; margin: 10px 0; background: #f9f9f9; }
    </style>
</head>
<body>
    <h2>Escribe tu comentario</h2>
    <form method="POST">
        <textarea name="comentario" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Publicar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comentario"])) {
        $prohibidas = ["tonto", "feo", "loco"];
        $comentario = $_POST["comentario"];
        $censurado = str_replace($prohibidas, "*****", $comentario);
        
        echo "<h3>Comentario publicado:</h3>";
        echo "<div class='comentario'>" . htmlspecialchars($censurado) . "</div>";
    }
    ?>
</body>
</html>