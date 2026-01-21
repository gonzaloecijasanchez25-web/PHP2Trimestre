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
        echo "\nPastel de " . $this->sabor . ": " . $this->nombre . " - " . $this->precio . " euros\n";
    }
    
    public function mostrarDetalles() {
        echo "\n--- Detalles del Pastel ---\n";
        echo "Nombre: " . $this->nombre . "\n";
        echo "Sabor: " . $this->sabor . "\n";
        echo "Precio: " . $this->precio . " euros\n";
        echo "---------------------------\n";
    }
}

echo "=== PANADERÍA ===\n\n";

echo "Ingresa el nombre del pastel: ";
$nombre = trim(fgets(STDIN));

echo "Ingresa el precio (en euros): ";
$precio = trim(fgets(STDIN));

echo "Ingresa el sabor: ";
$sabor = trim(fgets(STDIN));

$pastel = new Pastel($nombre, $precio, $sabor);

echo "\n--- Etiqueta del producto ---";
$pastel->etiqueta();
$pastel->mostrarDetalles();

echo "\n¿Quieres añadir otro pastel? (si/no): ";
$respuesta = trim(fgets(STDIN));

if ($respuesta == "si") {
    echo "\nIngresa el nombre del pastel: ";
    $nombre2 = trim(fgets(STDIN));
    
    echo "Ingresa el precio: ";
    $precio2 = trim(fgets(STDIN));
    
    echo "Ingresa el sabor: ";
    $sabor2 = trim(fgets(STDIN));
    
    $pastel2 = new Pastel($nombre2, $precio2, $sabor2);
    $pastel2->etiqueta();
    $pastel2->mostrarDetalles();
}

?>