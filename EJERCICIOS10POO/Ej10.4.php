<?php

class Notificacion {
    public $mensaje;
    
    public function __construct($mensaje) {
        $this->mensaje = $mensaje;
    }
    
    public function enviar() {
        echo "<p><strong>Enviando:</strong> " . $this->mensaje . "</p>";
    }
}

class Email extends Notificacion {
    public $destinatario;
    
    public function __construct($mensaje, $destinatario) {
        parent::__construct($mensaje);
        $this->destinatario = $destinatario;
    }
    
    public function enviar() {
        echo "<div style='background: #f3e5f5; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #9c27b0;'>";
        echo "<h3>📧 Email Enviado</h3>";
        echo "<p><strong>Para:</strong> " . $this->destinatario . "</p>";
        parent::enviar();
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Sistema de Notificaciones</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, textarea, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #9c27b0; color: white; border: none; cursor: pointer; }
        button:hover { background: #7b1fa2; }
        textarea { min-height: 80px; resize: vertical; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>📧 SISTEMA DE NOTIFICACIONES</h2>
    
    <form method="POST">
        <label>Mensaje:</label>
        <textarea name="mensaje" required placeholder="Escribe tu mensaje aquí..."></textarea>
        
        <label>Email del destinatario:</label>
        <input type="email" name="destinatario" required placeholder="ejemplo@correo.com">
        
        <button type="submit">Enviar Email</button>
    </form>
    
    <?php
    if ($_POST) {
        $email = new Email($_POST['mensaje'], $_POST['destinatario']);
        $email->enviar();
    }
    ?>
</body>
</html>