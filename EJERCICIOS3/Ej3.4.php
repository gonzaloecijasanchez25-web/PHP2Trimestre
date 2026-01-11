<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Día de Nacimiento</title>
</head>
<body>
    <h2>¿Qué día naciste?</h2>
    <form method="POST">
        Fecha de nacimiento: <input type="date" name="fecha" required>
        <input type="submit" value="Descubrir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["fecha"])) {
        $fecha = $_POST["fecha"];
        $timestamp = strtotime($fecha);  // Convierte la fecha a formato timestamp
        $dia_ingles = date("l", $timestamp);  // Obtiene el día en inglés (Monday, Tuesday...)
        
        // Array para traducir del inglés al español
        $traduccion = [
            "Monday" => "Lunes",
            "Tuesday" => "Martes",
            "Wednesday" => "Miércoles",
            "Thursday" => "Jueves",
            "Friday" => "Viernes",
            "Saturday" => "Sábado",
            "Sunday" => "Domingo"
        ];
        
        // Busca la traducción o pone "Desconocido" si no encuentra
        $dia_espanol = $traduccion[$dia_ingles] ?? "Desconocido";
        echo "<h3>Naciste un $dia_espanol.</h3>";  // Muestra el resultado
    }
    ?>
</body>
</html>