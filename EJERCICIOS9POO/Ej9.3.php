<?php

class Login {
    public $usuario;
    public $password;
    
    public function __construct($usuario, $password) {
        $this->usuario = $usuario;
        $this->password = $password;
    }
    
    public function comprobar() {
        echo "<div style='padding: 15px; margin: 10px 0; border-radius: 5px;";
        
        if ($this->password == "1234") {
            echo "background: #e8f5e9; border-left: 4px solid #4CAF50;'>";
            echo "<h3 style='color: #4CAF50;'>✓ Acceso Concedido</h3>";
            echo "<p>Bienvenido, <strong>" . $this->usuario . "</strong></p>";
        } else {
            echo "background: #ffebee; border-left: 4px solid #f44336;'>";
            echo "<h3 style='color: #f44336;'>✗ Contraseña Incorrecta</h3>";
            echo "<p>El acceso ha sido denegado para <strong>" . $this->usuario . "</strong></p>";
        }
        
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuario</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #9c27b0; color: white; border: none; cursor: pointer; }
        button:hover { background: #7b1fa2; }
        h2 { color: #333; }
        .pista { background: #fff3e0; padding: 10px; border-radius: 5px; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>🔐 LOGIN DE USUARIO</h2>
    
    <form method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario" required placeholder="Ingresa tu nombre de usuario">
        
        <label>Contraseña:</label>
        <input type="password" name="password" required placeholder="Ingresa tu contraseña">
        
        <button type="submit">Iniciar Sesión</button>
    </form>
    
    <?php
    if ($_POST) {
        $login = new Login($_POST['usuario'], $_POST['password']);
        $login->comprobar();
    }
    ?>
    
    <div class="pista">
        <p><strong>💡 Pista:</strong> La contraseña correcta es <code>1234</code></p>
    </div>
</body>
</html>