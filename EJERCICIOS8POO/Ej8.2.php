<?php
// Clase Tarea súper simple
class Tarea {
    public $nombre;
    public $descripcion;
    public $fechaLimite;
    public $estado;

    public function __construct($nombre, $descripcion, $fechaLimite) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->fechaLimite = $fechaLimite;
        $this->estado = "pendiente";
    }

    public function marcarComoCompletada() {
        $this->estado = "completada";
    }

    public function mostrarTarea() {
        echo "$this->nombre - $this->descripcion - $this->fechaLimite - $this->estado<br>";
    }
}

// Array de tareas
$tareas = array();

// Si ya se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tarea = new Tarea($_POST["nombre"], $_POST["descripcion"], $_POST["fecha"]);

    if (isset($_POST["completada"])) {
        $tarea->marcarComoCompletada();
    }

    // Guardamos la tarea en array
    $tareas[] = $tarea;
}
?>

<h2>Gestor de Tareas - Nivel Principiante</h2>

<form method="post">
    Nombre de la tarea: <input type="text" name="nombre"><br><br>
    Descripción: <input type="text" name="descripcion"><br><br>
    Fecha límite: <input type="text" name="fecha"><br><br>
    Completada: <input type="checkbox" name="completada"><br><br>
    <button type="submit">Añadir tarea</button>
</form>

<h3>Tareas actuales:</h3>

<?php
// Mostramos todas las tareas que se acaban de crear
foreach ($tareas as $t) {
    $t->mostrarTarea();
}
?>
