<?php
// Archivo para configurar todo automáticamente
$archivos = [
    'notas.txt' => "Nota 1: Estudiar PHP\nNota 2: Hacer ejercicios",
    'texto.txt' => "PHP es importante\nPHP es útil\nViva PHP",
    'tareas.txt' => "2026-01-13 21:00:00 | Configurar archivos",
    'usuarios.txt' => "", // Vacío para empezar
    'errores.log' => "" // Vacío para empezar
];

foreach ($archivos as $nombre => $contenido) {
    if (!file_exists($nombre)) {
        file_put_contents($nombre, $contenido);
        echo "Creado: $nombre<br>";
    } else {
        echo "Ya existe: $nombre<br>";
    }
}

echo "<hr><h3>🎯 Listo para probar ejercicios:</h3>";
echo "<a href='ejercicio24.php'>Ejercicio 24</a><br>";
echo "<a href='ejercicio25.php'>Ejercicio 25</a><br>";
echo "<a href='ejercicio26.php'>Ejercicio 26</a><br>";
echo "<a href='ejercicio27.php'>Ejercicio 27</a><br>";
echo "<a href='ejercicio28.php'>Ejercicio 28</a>";
?>