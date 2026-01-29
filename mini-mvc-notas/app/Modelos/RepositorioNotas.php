<?php

class RepositorioNotas
{
    private $rutaArchivo;

    public function __construct()
    {
        $this->rutaArchivo = __DIR__ . '/../../storage/notas.txt';
    }

    public function obtenerTodas()
    {
        // Si el archivo no existe, devolver array vacío
        if (!file_exists($this->rutaArchivo)) {
            return [];
        }

        $lineas = file($this->rutaArchivo, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $notas = [];

        foreach ($lineas as $linea) {
            try {
                $notas[] = Nota::desdeLinea($linea);
            } catch (Exception $e) {
                // Ignorar líneas corruptas y continuar
                continue;
            }
        }

        return $notas;
    }

    public function agregar(Nota $nota)
    {
        $linea = $nota->aLinea() . "\n";
        $resultado = file_put_contents($this->rutaArchivo, $linea, FILE_APPEND);

        if ($resultado === false) {
            throw new Exception("No se pudo escribir en notas.txt");
        }
    }
}
?>