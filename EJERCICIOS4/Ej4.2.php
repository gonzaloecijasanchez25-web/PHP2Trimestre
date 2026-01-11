<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Piedra, Papel o Tijera</title>
</head>
<body>
    <h2>Piedra, Papel o Tijera</h2>
    <form method="POST">
        Elige:
        <input type="radio" name="jugador" value="Piedra" required> Piedra
        <input type="radio" name="jugador" value="Papel"> Papel
        <input type="radio" name="jugador" value="Tijera"> Tijera<br>
        <input type="submit" value="Jugar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["jugador"])) {
        $opciones = ["Piedra", "Papel", "Tijera"];  // Opciones posibles
        $jugador = $_POST["jugador"];  // Elección del usuario
        $cpu = $opciones[rand(0, 2)];  // Elección aleatoria de la computadora
        
        echo "<h3>Resultado:</h3>";
        echo "Tú elegiste: $jugador<br>";
        echo "CPU eligió: $cpu<br><br>";
        
        // Lógica del juego: compara las elecciones
        if ($jugador == $cpu) {
            echo "<h4>¡Empate!</h4>";
        } elseif (
            ($jugador == "Piedra" && $cpu == "Tijera") ||
            ($jugador == "Papel" && $cpu == "Piedra") ||
            ($jugador == "Tijera" && $cpu == "Papel")
        ) {
            echo "<h4>¡Ganaste! 🎉</h4>";  // Usuario gana
        } else {
            echo "<h4>Perdiste 😢</h4>";  // Computadora gana
        }
    }
    ?>
</body>
</html>