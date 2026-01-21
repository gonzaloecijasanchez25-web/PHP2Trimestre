<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"] ?? "";
    $password = $_POST["password"] ?? "";
    $errores = [];
    
    if (strlen($password) < 8) {
        $errores[] = "Falta longitud (8 min)";
    }
    
    if (strpos($password, '@') === false && strpos($password, '#') === false) {
        $errores[] = "Falta @ o #";
    }
    
    if ($password == $usuario) {
        $errores[] = "Igual al usuario";
    }
    
    if (empty($errores)) {
        echo "<p style='color:green;'>✅ Contraseña segura</p>";
    } else {
        echo "<p style='color:red;'>❌ " . implode(" - ", $errores) . "</p>";
    }
}
?>

<form method="POST">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <button>Validar</button>
</form>

<p><small>Requisitos: 8+ caracteres, símbolo @ o #, diferente del usuario</small></p>