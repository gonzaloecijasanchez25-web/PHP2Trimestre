<?php

class Persona {
    public $nombre;
    public $edad;
    
    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

class Estudiante extends Persona {
    public $curso;
    
    public function __construct($nombre, $edad, $curso) {
        parent::__construct($nombre, $edad);
        $this->curso = $curso;
    }
    
    public function mostrarDatos() {
        echo "<div style='background: #e8f5e9; padding: 15px; margin: 10px 0; border-radius: 5px;'>";
        echo "<h3>Datos del Estudiante</h3>";
        echo "<p><strong>Nombre:</strong> " . $this->nombre . "</p>";
        echo "<p><strong>Edad:</strong> " . $this->edad . " años</p>";
        echo "<p><strong>Curso:</strong> " . $this->curso . "</p>";
        echo "</div>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Estudiantes</title>
    <style>
        body { font-family: Arial; max-width: 600px; margin: 50px auto; padding: 20px; }
        input, button { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
        button { background: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { background: #45a049; }
        h2 { color: #333; }
    </style>
</head>
<body>
    <h2>REGISTRO DE ESTUDIANTES</h2>
    
    <form method="POST">
        <label>Nombre del estudiante:</label>
        <input type="text" name="nombre" required>
        
        <label>Edad:</label>
        <input type="number" name="edad" required>
        
        <label>Curso:</label>
        <input type="text" name="curso" required>
        
        <button type="submit">Registrar Estudiante</button>
    </form>
    
    <?php
    if ($_POST) {
        $estudiante = new Estudiante($_POST['nombre'], $_POST['edad'], $_POST['curso']);
        $estudiante->mostrarDatos();
    }
    ?>
</body>
</html>