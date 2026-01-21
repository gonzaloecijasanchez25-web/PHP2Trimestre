<?php

class Producto {
    public $descripcion;
    public $precioSinIva;
    
    public function __construct($descripcion, $precioSinIva) {
        $this->descripcion = $descripcion;
        $this->precioSinIva = $precioSinIva;
    }
    
    public function precioFinal() {
        $iva = $this->precioSinIva * 0.21;
        $precioConIva = $this->precioSinIva + $iva;
        
        echo "<div style='background: #e3f2fd; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
        echo "<h3>Detalles del Producto</h3>";
        echo "<p><strong>Producto:</strong> " . $this->descripcion . "</p>";
        echo "<p><strong>Precio sin IVA:</strong> " . number_format($this->precioSinIva, 2) . " €</p>";
        echo "<p><strong>IVA (21%):</strong> " . number_format($iva, 2) . " €</p>";
        echo "<p style='font-size: 20px; color: #2196F3;'><strong>Precio final:</strong> " . number_format($precioConIva, 2) . " €</p>";
        echo "</div>";
        
        return $precioConIva;
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Producto con IVA</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #2196F3; color: white; border: none; cursor: pointer; }
        button:hover { background: #0b7dda; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>💰 CALCULADORA DE PRECIOS CON IVA</h2>
    
    <form method="POST">
        <label>Descripción del producto:</label>
        <input type="text" name="descripcion" required placeholder="Ej: Ordenador, Móvil, Teclado...">
        
        <label>Precio sin IVA (en euros):</label>
        <input type="number" step="0.01" name="precio" required placeholder="Ej: 500">
        
        <button type="submit">Calcular Precio Final</button>
    </form>
    
    <?php
    if ($_POST) {
        $producto = new Producto($_POST['descripcion'], $_POST['precio']);
        $producto->precioFinal();
    }
    ?>
</body>
</html>