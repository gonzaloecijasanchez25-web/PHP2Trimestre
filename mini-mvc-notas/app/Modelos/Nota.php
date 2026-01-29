<?php

class Nota
{
    public $id;
    public $texto;
    public $fecha;

    public function __construct($id, $texto, $fecha = null)
    {
        $this->id = $id;
        $this->texto = $texto;
        $this->fecha = $fecha ?: date('Y-m-d H:i:s');
    }

    // Convierte la nota a formato línea para el archivo
    public function aLinea()
    {
        return $this->id . "|" . $this->texto . "|" . $this->fecha;
    }

    // Crea una nota desde una línea del archivo
    public static function desdeLinea($linea)
    {
        $partes = explode('|', trim($linea));
        
        if (count($partes) !== 3) {
            throw new Exception("Línea corrupta en notas.txt: " . $linea);
        }

        return new Nota($partes[0], $partes[1], $partes[2]);
    }
}
?>