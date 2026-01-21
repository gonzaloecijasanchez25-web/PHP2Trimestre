<?php
function buscarPalabra($archivo, $palabra) {
    if (!file_exists($archivo)) {
        throw new Exception("Archivo no existe");
    }
    
    if (empty($palabra)) {
        throw new Exception("Palabra vacía");
    }
    
    $contenido = file_get_contents($archivo);
    $contenidoMinus = strtolower($contenido);
    $palabraMinus = strtolower($palabra);
    
    return substr_count($contenidoMinus, $palabraMinus);
}

try {
    $archivo = "texto.txt";
    $palabra = "PHP";
    
    $veces = buscarPalabra($archivo, $palabra);
    echo "La palabra '$palabra' aparece $veces veces";
} catch (Exception $e) {
    $error = date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL;
    file_put_contents("errores.log", $error, FILE_APPEND);
    echo "Error: " . $e->getMessage();
}
?>