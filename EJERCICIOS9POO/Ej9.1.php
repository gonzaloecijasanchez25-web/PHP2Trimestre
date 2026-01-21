<?php

class Empleado {
    public $nombre;
    public $puesto;
    public $sueldo;
    
    public function __construct($nombre, $puesto, $sueldo) {
        $this->nombre = $nombre;
        $this->puesto = $puesto;
        $this->sueldo = $sueldo;
    }
    
    public function revisarSueldo() {
        echo "<div style='background: #f5f5f5; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
        echo "<h3>Revisión de Sueldo</h3>";
        echo "<p><strong>Empleado:</strong> " . $this->nombre . "</p>";
        echo "<p><strong>Puesto:</strong> " . $this->puesto . "</p>";
        echo "<p><strong>Sueldo anterior:</strong> " . $this->sueldo . " €</p>";
        
        if ($this->sueldo < 1000) {
            $this->sueldo = $this->sueldo + 200;
            echo "<p style='color: #4CAF50; font-weight: bold;'>✓ Sueldo actualizado: " . $this->sueldo . " € (+200 €)</p>";
        } else {
            echo "<p style='color: #2196F3; font-weight: bold;'>✓ El sueldo es correcto</p>";
        }
        
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Empleado</title>
    <style>
        body { font-family: Arial; max-width: 700px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #9c27b0; color: white; border: none; cursor: pointer; }
        button:hover { background: #7b1fa2; }
        h2 { color: #333; }
        .ejemplo { background: #e8f5e9; padding: 15px; margin: 20px 0; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>👤 SISTEMA DE EMPLEADOS</h2>
    
    <form method="POST">
        <label>Nombre del empleado:</label>
        <input type="text" name="nombre" required placeholder="Ej: Juan, María...">
        
        <label>Puesto:</label>
        <input type="text" name="puesto" required placeholder="Ej: Becario, Jefe, Programador...">
        
        <label>Sueldo actual (en euros):</label>
        <input type="number" step="0.01" name="sueldo" required placeholder="Ej: 800, 2500...">
        
        <button type="submit">Revisar Sueldo</button>
    </form>
    
    <?php
    if ($_POST) {
        $empleado = new Empleado($_POST['nombre'], $_POST['puesto'], $_POST['sueldo']);
        $empleado->revisarSueldo();
    }
    ?>
    
    <div class="ejemplo">
        <h3>💡 Ejemplos para probar:</h3>
        <ul>
            <li><strong>Becario con 800€:</strong> Debería recibir un aumento de 200€</li>
            <li><strong>Jefa con 2500€:</strong> El sueldo debería mantenerse</li>
            <li><strong>Junior con 999€:</strong> Debería recibir un aumento de 200€</li>
            <li><strong>Senior con 1000€:</strong> El sueldo debería mantenerse</li>
        </ul>
    </div>
</body>
</html>