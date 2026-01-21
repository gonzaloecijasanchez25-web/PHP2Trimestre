<?php
try {
    $archivo = "usuarios.txt";
    
    if (!file_exists($archivo)) {
        throw new Exception("Archivo no existe");
    }
    
    $contenido = file_get_contents($archivo);
    
    if (empty(trim($contenido))) {
        echo "El archivo está vacío";
    } else {
        $lineas = explode(PHP_EOL, $contenido);
        $contador = 0;
        
        foreach ($lineas as $linea) {
            if (!empty(trim($linea))) {
                $contador++;
            }
        }
        
        echo "Líneas: " . $contador;
    }
} catch (Exception $e) {
    $error = date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL;
    file_put_contents("errores.log", $error, FILE_APPEND);
    echo "Error: " . $e->getMessage();
}
?>