<?php

require_once __DIR__ . '/Contacto.php';

class RepositorioContactos {
    
    private $rutaArchivo;
    
    public function __construct() {
        $this->rutaArchivo = __DIR__ . '/../../storage/agenda.txt';
    }
    
    public function obtenerTodos() {
        if (!file_exists($this->rutaArchivo)) {
            return [];
        }
        
        $lineas = file($this->rutaArchivo);
        $contactos = [];
        
        foreach ($lineas as $linea) {
            if (trim($linea) === '') {
                continue;
            }
            
            $contactos[] = Contacto::desdeLinea($linea);
        }
        
        return $contactos;
    }
    
    public function agregar(Contacto $contacto) {
        $linea = $contacto->aLinea() . "\n";
        
        $resultado = file_put_contents($this->rutaArchivo, $linea, FILE_APPEND);
        
        if ($resultado === false) {
            throw new Exception("No se pudo escribir en agenda.txt");
        }
    }
}

?>