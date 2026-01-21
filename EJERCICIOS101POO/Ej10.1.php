<?php

class Alumno {
    public $nombre;
    public $curso;
    
    public function __construct($nombre, $curso) {
        $this->nombre = $nombre;
        $this->curso = $curso;
    }
    
    public function presentarse() {
        echo "Soy " . $this->nombre . " y estudio " . $this->curso . "\n";
    }
}

echo "=== FICHA DEL ALUMNO ===\n\n";

echo "Ingresa el nombre del alumno: ";
$nombre = trim(fgets(STDIN));

echo "Ingresa el curso: ";
$curso = trim(fgets(STDIN));

$alumno = new Alumno($nombre, $curso);

echo "\n--- Presentación ---\n";
$alumno->presentarse();

echo "\n¿Quieres crear otro alumno? (si/no): ";
$respuesta = trim(fgets(STDIN));

if ($respuesta == "si") {
    echo "\nIngresa el nombre del segundo alumno: ";
    $nombre2 = trim(fgets(STDIN));
    
    echo "Ingresa el curso: ";
    $curso2 = trim(fgets(STDIN));
    
    $alumno2 = new Alumno($nombre2, $curso2);
    
    echo "\n--- Presentación ---\n";
    $alumno2->presentarse();
}

?>