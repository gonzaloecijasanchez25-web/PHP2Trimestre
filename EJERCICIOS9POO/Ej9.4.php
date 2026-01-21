<?php

class CocheF1 {
    public $piloto;
    public $velocidad;
    
    public function __construct($piloto) {
        $this->piloto = $piloto;
        $this->velocidad = 0;
    }
    
    public function acelerar() {
        $this->velocidad = $this->velocidad + 20;
        echo "<p style='background: #ffebee; padding: 10px; border-radius: 5px; border-left: 4px solid #f44336;'>";
        echo "🏎️ <strong>" . $this->piloto . "</strong> acelera! Nueva velocidad: <strong>" . $this->velocidad . " km/h</strong>";
        echo "</p>";
    }
    
    public function mostrarVelocidad() {
        echo "<div style='background: #e3f2fd; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
        echo "<h3>Estado del Coche</h3>";
        echo "<p><strong>Piloto:</strong> " . $this->piloto . "</p>";
        echo "<p><strong>Velocidad actual:</strong> " . $this->velocidad . " km/h</p>";
        echo "</div>";
    }
}

session_start();

if (isset($_POST['crear'])) {
    $_SESSION['coche'] = new CocheF1($_POST['piloto']);
}

if (isset($_POST['acelerar']) && isset($_SESSION['coche'])) {
    $_SESSION['coche']->acelerar();
}

if (isset($_POST['reiniciar'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Coche de Carreras</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #f44336; color: white; border: none; cursor: pointer; }
        button:hover { background: #da190b; }
        .btn-acelerar { background: #ff9800; }
        .btn-reiniciar { background: #9e9e9e; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>🏎️ COCHE DE CARRERAS F1</h2>
    
    <?php if (!isset($_SESSION['coche'])): ?>
        <form method="POST">
            <label>Nombre del piloto:</label>
            <input type="text" name="piloto" required placeholder="Ej: Alonso, Hamilton, Verstappen...">
            
            <button type="submit" name="crear">Crear Coche</button>
        </form>
        
        <div style='background: #fff3e0; padding: 10px; border-radius: 5px; margin-top: 20px;'>
            <p><strong>ℹ️ Nota:</strong> El coche empezará con velocidad 0 km/h automáticamente</p>
        </div>
    <?php else: ?>
        <?php $_SESSION['coche']->mostrarVelocidad(); ?>
        
        <form method="POST">
            <button type="submit" name="acelerar" class="btn-acelerar">⚡ Acelerar (+20 km/h)</button>
        </form>
        
        <form method="POST">
            <button type="submit" name="reiniciar" class="btn-reiniciar">🔄 Nuevo Coche</button>
        </form>
    <?php endif; ?>
</body>
</html>