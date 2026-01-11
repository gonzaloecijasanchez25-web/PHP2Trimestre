<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Generador de Emails</title>
</head>
<body>
    <h2>Generar Email Corporativo</h2>
    <form method="POST">
        Nombre: <input type="text" name="nombre" required><br>
        Apellido: <input type="text" name="apellido" required><br>
        Dominio: <input type="text" name="dominio" required><br>
        <input type="submit" value="Generar Email">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = trim($_POST["nombre"]);  // Elimina espacios al inicio y final
        $apellido = trim($_POST["apellido"]);
        $dominio = trim($_POST["dominio"]);
        
        // Genera el email: primera letra del nombre + apellido completo + @ + dominio
        $inicial = substr($nombre, 0, 1);  // Toma la primera letra del nombre
        $email = strtolower($inicial . $apellido . "@" . $dominio);  // Convierte todo a minúsculas
        
        echo "<h3>Tu nuevo correo es: $email</h3>";  // Muestra el email generado
    }
    ?>
</body>
</html>