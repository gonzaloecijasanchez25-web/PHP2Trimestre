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
        echo "\nTengo un reloj " . $this->marca . " con " . $this->sistemaOperativo . "\n";
    }
    
    public function detalles() {
        echo "\n--- Detalles del SmartWatch ---\n";
        echo "Marca: " . $this->marca . "\n";
        echo "Sistema Operativo: " . $this->sistemaOperativo . "\n";
        echo "-------------------------------\n";
    }
}

echo "=== TIENDA DE SMARTWATCHES ===\n\n";

echo "Ingresa la marca del smartwatch: ";
$marca = trim(fgets(STDIN));

echo "Ingresa el sistema operativo (Android/WatchOS/Otros): ";
$sistema = trim(fgets(STDIN));

$reloj = new SmartWatch($marca, $sistema);
$reloj->mostrarInfo();
$reloj->detalles();

echo "\n¿Quieres añadir otro smartwatch? (si/no): ";
$respuesta = trim(fgets(STDIN));

if ($respuesta == "si") {
    echo "\nIngresa la marca: ";
    $marca2 = trim(fgets(STDIN));
    
    echo "Ingresa el sistema operativo: ";
    $sistema2 = trim(fgets(STDIN));
    
    $reloj2 = new SmartWatch($marca2, $sistema2);
    $reloj2->mostrarInfo();
    $reloj2->detalles();
}

?>