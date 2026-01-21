<?php
class CocheF1 {
    public $piloto;
    public $velocidad;
    
    // El constructor solo recibe el piloto, la velocidad se pone automáticamente a 0
    public function __construct($nombrePiloto) {
        $this->piloto = $nombrePiloto;
        $this->velocidad = 0;  // Valor por defecto
        echo "¡" . $this->piloto . " está listo en la parrilla de salida!<br>";
    }
    
    public function acelerar() {
        $this->velocidad += 20;  // Aumenta 20 km/h
        echo $this->piloto . " acelera. Velocidad: " . $this->velocidad . " km/h<br>";
    }
}

// Prueba del ejercicio
echo "<br><strong>Ejercicio 4: El Coche de Carreras</strong><br><br>";

// Crear el coche de Alonso (no decimos la velocidad, el constructor la pone a 0)
$cocheAlonso = new CocheF1("Alonso");

// Acelerar dos veces
$cocheAlonso->acelerar();
$cocheAlonso->acelerar();

// Podemos crear otro coche
echo "<br>";
$cocheHamilton = new CocheF1("Hamilton");
$cocheHamilton->acelerar();
$cocheHamilton->acelerar();
$cocheHamilton->acelerar();  // Tercera aceleración
?>