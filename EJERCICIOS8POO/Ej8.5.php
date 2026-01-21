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
        if ($this->sueldo < 1000) {
            $this->sueldo += 200;
            echo "$this->nombre: Sueldo actualizado a $this->sueldo €<br>";
        } else {
            echo "$this->nombre: El sueldo es correcto ($this->sueldo €)<br>";
        }
    }
}

$empleados = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $e = new Empleado($_POST['nombre'], $_POST['puesto'], $_POST['sueldo']);
    $empleados[] = $e;
}
?>

<h2>Empleado - Nivel Principiante</h2>

<form method="post">
    Nombre: <input type="text" name="nombre"><br><br>
    Puesto: <input type="text" name="puesto"><br><br>
    Sueldo: <input type="number" name="sueldo"><br><br>
    <button type="submit">Crear empleado</button>
</form>

<h3>Revisión de sueldo:</h3>
<?php
foreach ($empleados as $e) {
    $e->revisarSueldo();
}
?>
