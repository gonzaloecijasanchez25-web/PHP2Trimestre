<?php
$opcion = $_POST['opcion'] ?? '1';

try {
    if ($opcion == '1') {
        // Añadir tarea
        $tarea = $_POST['tarea'] ?? '';
        
        if (empty($tarea)) {
            throw new Exception("Tarea vacía");
        }
        
        $linea = date('Y-m-d H:i:s') . " | $tarea" . PHP_EOL;
        file_put_contents("tareas.txt", $linea, FILE_APPEND);
        echo "Tarea añadida";
        
    } elseif ($opcion == '2') {
        // Listar tareas
        if (!file_exists("tareas.txt")) {
            echo "No hay tareas todavía";
        } else {
            $contenido = file_get_contents("tareas.txt");
            echo "<pre>" . htmlspecialchars($contenido) . "</pre>";
        }
    }
} catch (Exception $e) {
    $error = date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL;
    file_put_contents("errores.log", $error, FILE_APPEND);
    echo "Error: " . $e->getMessage();
}
?>

<form method="POST">
    <select name="opcion">
        <option value="1">Añadir tarea</option>
        <option value="2">Listar tareas</option>
    </select><br>
    
    <input type="text" name="tarea" placeholder="Nueva tarea"><br>
    
    <button>Ejecutar</button>
</form>