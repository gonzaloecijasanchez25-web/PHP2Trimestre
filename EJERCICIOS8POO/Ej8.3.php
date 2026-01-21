<?php
// Clase Empleado
class Empleado {
    public $nombre;
    public $sueldo;
    public $anios;

    public function __construct($nombre, $sueldo, $anios) {
        $this->nombre = $nombre;
        $this->sueldo = $sueldo;
        $this->anios = $anios;
    }

    public function calcularBonus() {
        return ($this->sueldo * 0.05) * floor($this->anios / 2);
    }

    public function mostrarDetalles() {
        echo "$this->nombre - Sueldo: $this->sueldo € - Bonus: " . $this->calcularBonus() . " €<br>";
    }
}

// Clase Consultor (hereda de Empleado)
class Consultor extends Empleado {
    public $horas;

    public function __construct($nombre, $sueldo, $anios, $horas) {
        parent::__construct($nombre, $sueldo, $anios);
        $this->horas = $horas;
    }

    public function calcularBonus() {
        $bonus = parent::calcularBonus();
        if ($this->horas > 100) $bonus += 500;
        return $bonus;
    }
}

// Array para guardar empleados creados
$empleados = array();

// Si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["tipo"] == "empleado") {
        $e = new Empleado($_POST["nombre"], $_POST["sueldo"], $_POST["anios"]);
    } else {
        $e = new Consultor($_POST["nombre"], $_POST["sueldo"], $_POST["anios"], $_POST["horas"]);
    }
    $empleados[] = $e;
}
?>

<h2>Empleados y Consultores</h2>

<form method="post">
    Tipo: 
    <select name="tipo">
        <option value="empleado">Empleado</option>
        <option value="consultor">Consultor</option>
    </select><br><br>

    Nombre: <input type="text" name="nombre"><br><br>
    Sueldo: <input type="number" name="sueldo"><br><br>
    Años de experiencia: <input type="number" name="anios"><br><br>
    Horas por proyecto (solo consultor): <input type="number" name="horas"><br><br>

    <button type="submit">Crear</button>
</form>

<h3>Detalles:</h3>
<?php
foreach ($empleados as $e) {
    $e->mostrarDetalles();
}
?>
