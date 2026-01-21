<?php
function leerArchivo($nombre) {
    if (!file_exists($nombre)) {
        throw new Exception("Archivo no existe");
    }
    
    if (!is_readable($nombre)) {
        throw new Exception("Archivo no legible");
    }
    
    return file_get_contents($nombre);
}

try {
    $contenido = leerArchivo("notas.txt");
    echo "<pre>" . htmlspecialchars($contenido) . "</pre>";
} catch (Exception $e) {
    $error = date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL;
    file_put_contents("errores.log", $error, FILE_APPEND);
    echo "Error: " . $e->getMessage() . " (ver errores.log)";
}
?>