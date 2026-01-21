<?php
function validarUsuario($nombre, $email) {
    if (empty($nombre)) {
        throw new Exception("Nombre vacío");
    }
    
    if (strpos($email, '@') === false) {
        throw new Exception("Email sin @");
    }
}

try {
    $nombre = "Gonzalo";
    $email = "gonzalo.e@email.com";
    
    validarUsuario($nombre, $email);
    
    $linea = date('Y-m-d H:i:s') . " | $nombre | $email" . PHP_EOL;
    file_put_contents("usuarios.txt", $linea, FILE_APPEND);
    
    echo "Usuario guardado";
} catch (Exception $e) {
    $error = date('Y-m-d H:i:s') . " - " . $e->getMessage() . PHP_EOL;
    file_put_contents("errores.log", $error, FILE_APPEND);
    echo "Error: " . $e->getMessage();
}
?>