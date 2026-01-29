<?php
require_once __DIR__ . '/../app/Controladores/ControladorNotas.php';

$accion = $_GET['accion'] ?? 'listar';
$controlador = new ControladorNotas();

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
        break;
}
?>