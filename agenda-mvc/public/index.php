<?php

require_once __DIR__ . '/../app/Controladores/ControladorContactos.php';

$controlador = new ControladorContactos();

$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
    case 'listar':
        $controlador->listar();
        break;
    
    case 'crear':
        $controlador->crear();
        break;
    
    case 'guardar':
        $controlador->guardar();
        break;
    
    default:
        echo "Acción no válida";
}

?>