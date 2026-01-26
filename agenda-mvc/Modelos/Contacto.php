<?php

class Contacto {
    
    public $id;
    public $nombre;
    public $telefono;
    public $fecha;
    
    public function aLinea() {
        return $this->id . "|" . $this->nombre . "|" . $this->telefono . "|" . $this->fecha;
    }
    
    public static function desdeLinea($linea) {
        $partes = explode('|', trim($linea));
        
        if (count($partes) !== 4) {
            throw new Exception("Línea corrupta en agenda.txt: " . $linea);
        }
        
        $contacto = new Contacto();
        $contacto->id = $partes[0];
        $contacto->nombre = $partes[1];
        $contacto->telefono = $partes[2];
        $contacto->fecha = $partes[3];
        
        return $contacto;
    }
}

?>