<?php

class Reloj {
    public $marca;
    
    public function __construct($marca) {
        $this->marca = $marca;
    }
}

class SmartWatch extends Reloj {
    public $sistemaOperativo;
    
    public function __construct($marca, $sistemaOperativo) {
        parent::__construct($marca);
        $this->sistemaOperativo = $sistemaOperativo;
    }
    
    public function mostrarInfo() {
        echo "<div style='background: #e3f2fd; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
        echo "<h3>Tengo un reloj " . $this->marca . " con " . $this->sistemaOperativo . "</h3>";
        echo "<p><strong>Marca:</strong> " . $this->marca . "</p>";
        echo "<p><strong>Sistema Operativo:</strong> " . $this->sistemaOperativo . "</p>";
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tienda de Smartwatches</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, select, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #2196F3; color: white; border: none; cursor: pointer; }
        button:hover { background: #0b7dda; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>TIENDA DE SMARTWATCHES</h2>
    
    <form method="POST">
        <label>Marca del smartwatch:</label>
        <input type="text" name="marca" required>
        
        <label>Sistema Operativo:</label>
        <select name="sistema" required>
            <option value="">Selecciona...</option>
            <option value="Android Wear">Android Wear</option>
            <option value="WatchOS">WatchOS</option>
            <option value="HarmonyOS">HarmonyOS</option>
            <option value="Otros">Otros</option>
        </select>
        
        <button type="submit">Agregar Smartwatch</button>
    </form>
    
    <?php
    if ($_POST) {
        $reloj = new SmartWatch($_POST['marca'], $_POST['sistema']);
        $reloj->mostrarInfo();
    }
    ?>
</body>
</html>