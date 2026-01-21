<?php
class Empleado {
    public $nombre;
    public $puesto;
    public $sueldo;
    
    public function __construct($nombreEmpleado, $puestoEmpleado, $sueldoEmpleado) {
        $this->nombre = $nombreEmpleado;
        $this->puesto = $puestoEmpleado;
        $this->sueldo = $sueldoEmpleado;
    }
    
    public function revisarSueldo() {
        echo "<strong>" . $this->nombre . " - " . $this->puesto . "</strong><br>";
        echo "Sueldo actual: " . $this->sueldo . "€<br>";
        
        if ($this->sueldo < 1000) {
            $this->sueldo += 200;  // Aumentamos el sueldo
            echo "Sueldo actualizado (+200€).<br>";
            echo "Nuevo sueldo: " . $this->sueldo . "€<br>";
        } else {
            echo "El sueldo es correcto. No se requiere ajuste.<br>";
        }
        echo "<br>";
    }
    
    // Método extra para mostrar información (no pedido en el ejercicio)
    public function mostrarInfo() {
        echo $this->nombre . " (" . $this->puesto . "): " . $this->sueldo . "€<br>";
    }
}

// Prueba del ejercicio
echo "<br><strong>Ejercicio 5: El Empleado</strong><br><br>";

// Crear el empleado Becario
$becario = new Empleado("Carlos", "Becario", 800);

// Crear la empleada Jefa
$jefa = new Empleado("Laura", "Jefa de Proyecto", 2500);

// Revisar sueldos
$becario->revisarSueldo();
$jefa->revisarSueldo();

// Mostrar información final
echo "<strong>Resumen final:</strong><br>";
$becario->mostrarInfo();
$jefa->mostrarInfo();
?>