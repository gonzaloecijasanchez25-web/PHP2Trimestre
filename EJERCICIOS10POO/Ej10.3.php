<?php

class Producto {
    public $nombre;
    public $precio;
    
    public function __construct($nombre, $precio) {
        $this->nombre = $nombre;
        $this->precio = $precio;
    }
}

class Pastel extends Producto {
    public $sabor;
    
    public function __construct($nombre, $precio, $sabor) {
        parent::__construct($nombre, $precio);
        $this->sabor = $sabor;
    }
    
    public function etiqueta() {
        echo "<div style='background: #fff3e0; padding: 15px; margin: 10px 0; border-radius: 5px; border-left: 4px solid #ff9800;'>";
        echo "<h3>Pastel de " . $this->sabor . ": " . $this->nombre . " - " . $this->precio . " euros</h3>";
        echo "<p><strong>Nombre:</strong> " . $this->nombre . "</p>";
        echo "<p><strong>Sabor:</strong> " . $this->sabor . "</p>";
        echo "<p><strong>Precio:</strong> " . $this->precio . " euros</p>";
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panadería</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #ff9800; color: white; border: none; cursor: pointer; }
        button:hover { background: #e68900; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>🥐 PANADERÍA</h2>
    
    <form method="POST">
        <label>Nombre del pastel:</label>
        <input type="text" name="nombre" required placeholder="Ej: Donut">
        
        <label>Precio (en euros):</label>
        <input type="number" step="0.01" name="precio" required placeholder="Ej: 1.50">
        
        <label>Sabor:</label>
        <input type="text" name="sabor" required placeholder="Ej: Chocolate">
        
        <button type="submit">Crear Pastel</button>
    </form>
    
    <?php
    if ($_POST) {
        $pastel = new Pastel($_POST['nombre'], $_POST['precio'], $_POST['sabor']);
        $pastel->etiqueta();
    }
    ?>
</body>
</html>