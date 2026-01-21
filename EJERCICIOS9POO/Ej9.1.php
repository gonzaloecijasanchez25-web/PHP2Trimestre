<?php

class Personaje {
    public $nombre;
    public $puntosVida;
    
    public function __construct($nombre, $puntosVida) {
        $this->nombre = $nombre;
        $this->puntosVida = $puntosVida;
    }
    
    public function mostrarEstado() {
        echo "Personaje: " . $this->nombre . "\n";
        echo "Puntos de vida: " . $this->puntosVida . "\n";
    }
}

class Guerrero extends Personaje {
    public $arma;
    
    public function __construct($nombre, $puntosVida) {
        parent::__construct($nombre, $puntosVida);
        $this->arma = "Espada";
    }
    
    public function mostrarGuerrero() {
        echo "\n--- Guerrero Creado ---\n";
        echo "Nombre: " . $this->nombre . "\n";
        echo "Puntos de vida: " . $this->puntosVida . "\n";
        echo "Arma: " . $this->arma . " (asignada automáticamente)\n";
        echo "-----------------------\n";
    }
    
    public function atacar() {
        echo "\n" . $this->nombre . " ataca con su " . $this->arma . "!\n";
    }
}

echo "=== CREADOR DE GUERREROS ===\n\n";

echo "Ingresa el nombre del guerrero: ";
$nombre = trim(fgets(STDIN));

echo "Ingresa los puntos de vida: ";
$vida = trim(fgets(STDIN));

$guerrero = new Guerrero($nombre, $vida);
$guerrero->mostrarGuerrero();
$guerrero->atacar();

echo "\n¿Quieres crear otro guerrero? (si/no): ";
$respuesta = trim(fgets(STDIN));

if ($respuesta == "si") {
    echo "\nIngresa el nombre del segundo guerrero: ";
    $nombre2 = trim(fgets(STDIN));
    
    echo "Ingresa los puntos de vida: ";
    $vida2 = trim(fgets(STDIN));
    
    $guerrero2 = new Guerrero($nombre2, $vida2);
    $guerrero2->mostrarGuerrero();
    $guerrero2->atacar();
    
    echo "\n--- Batalla ---\n";
    echo $guerrero->nombre . " VS " . $guerrero2->nombre . "\n";
    if ($guerrero->puntosVida > $guerrero2->puntosVida) {
        echo "¡" . $guerrero->nombre . " tiene más vida!\n";
    } elseif ($guerrero2->puntosVida > $guerrero->puntosVida) {
        echo "¡" . $guerrero2->nombre . " tiene más vida!\n";
    } else {
        echo "¡Están igualados!\n";
    }
}

?>