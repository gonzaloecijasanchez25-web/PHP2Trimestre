<?php

require_once __DIR__ . '/../Modelos/RepositorioContactos.php';
require_once __DIR__ . '/../Modelos/Contacto.php';

class ControladorContactos {
    
    private $repositorio;
    
    public function __construct() {
        $this->repositorio = new RepositorioContactos();
    }
    
    public function listar() {
        try {
            $contactos = $this->repositorio->obtenerTodos();
            $this->renderizar('contactos/listar', ['contactos' => $contactos]);
        } catch (Exception $e) {
            $this->registrarError('LISTAR', $e);
            $this->renderizar('contactos/listar', ['contactos' => [], 'error' => 'No se pudieron cargar los contactos']);
        }
    }
    
    public function crear() {
        $this->renderizar('contactos/crear', ['antiguos' => ['nombre' => '', 'telefono' => '']]);
    }
    
    public function guardar() {
        try {
            $nombre = trim($_POST['nombre'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');
            
            if (strlen($nombre) < 3) {
                throw new Exception("El nombre debe tener al menos 3 caracteres");
            }
            
            if (strlen($nombre) > 50) {
                throw new Exception("El nombre no puede superar 50 caracteres");
            }
            
            if (strlen($telefono) < 9) {
                throw new Exception("El teléfono debe tener al menos 9 caracteres");
            }
            
            $contacto = new Contacto();
            $contacto->id = time();
            $contacto->nombre = $nombre;
            $contacto->telefono = $telefono;
            $contacto->fecha = date('Y-m-d H:i:s');
            
            $this->repositorio->agregar($contacto);
            
            header("Location: index.php?accion=listar");
            exit;
            
        } catch (Exception $e) {
            $this->registrarError('GUARDAR', $e);
            $this->renderizar('contactos/crear', [
                'antiguos' => [
                    'nombre' => $_POST['nombre'] ?? '',
                    'telefono' => $_POST['telefono'] ?? ''
                ],
                'error' => $e->getMessage()
            ]);
        }
    }
    
    private function renderizar($vista, $datos = []) {
        extract($datos);
        
        $archivoVista = __DIR__ . '/../Vistas/' . $vista . '.php';
        $vistaContenido = $archivoVista;
        
        require __DIR__ . '/../Vistas/layout.php';
    }
    
    private function registrarError($contexto, $e) {
        $archivoLog = __DIR__ . '/../../storage/errores.log';
        $fecha = date('Y-m-d H:i:s');
        
        $linea = $fecha . " | " . $contexto . " | " . $e->getMessage() . "\n";
        file_put_contents($archivoLog, $linea, FILE_APPEND);
    }
}

?>