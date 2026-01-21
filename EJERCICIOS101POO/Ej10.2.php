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
        echo "\n--- Revisión de sueldo ---\n";
        echo "Empleado: " . $this->nombre . "\n";
        echo "Puesto: " . $this->puesto . "\n";
        echo "Sueldo actual: " . $this->sueldo . " euros\n";
        
        if ($this->sueldo < 1000) {
            $this->sueldo = $this->sueldo + 200;
            echo "✓ Sueldo actualizado: " . $this->sueldo . " euros (+200 euros)\n";
        } else {
            echo "✓ El sueldo es correcto\n";
        }
        echo "-------------------------\n";
    }
    
    public function mostrarDatos() {
        echo "\nEmpleado: " . $this->nombre . "\n";
        echo "Puesto: " . $this->puesto . "\n";
        echo "Sueldo: " . $this->sueldo . " euros\n";
    }
}

echo "=== SISTEMA DE RECURSOS HUMANOS ===\n\n";

// Crear primer empleado
echo "--- EMPLEADO 1 ---\n";
echo "Nombre: ";
$nombre1 = trim(fgets(STDIN));

echo "Puesto: ";
$puesto1 = trim(fgets(STDIN));

echo "Sueldo actual (en euros): ";
$sueldo1 = trim(fgets(STDIN));

$empleado1 = new Empleado($nombre1, $puesto1, $sueldo1);

// Crear segundo empleado
echo "\n--- EMPLEADO 2 ---\n";
echo "Nombre: ";
$nombre2 = trim(fgets(STDIN));

echo "Puesto: ";
$puesto2 = trim(fgets(STDIN));

echo "Sueldo actual (en euros): ";
$sueldo2 = trim(fgets(STDIN));

$empleado2 = new Empleado($nombre2, $puesto2, $sueldo2);

// Revisar sueldos
echo "\n\n=== REVISIÓN ANUAL DE SUELDOS ===\n";

$empleado1->revisarSueldo();
$empleado2->revisarSueldo();

// Resumen final
echo "\n\n=== RESUMEN FINAL ===\n";
$empleado1->mostrarDatos();
$empleado2->mostrarDatos();

// Calcular total de nóminas
$totalNominas = $empleado1->sueldo + $empleado2->sueldo;
echo "\n--- Total de nóminas: " . $totalNominas . " euros ---\n";

?>