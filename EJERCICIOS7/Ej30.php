<?php
// EJERCICIO 30 - Leer fichero y mostrar en tabla HTML

// Variables
$registros = array();
$mensaje = '';
$hayError = false;

try {
    // Comprobar si existe el archivo
    if (!file_exists('registros.txt')) {
        throw new Exception("No existe registros.txt");
    }
    
    // Leer el archivo línea por línea
    $archivo = fopen('registros.txt', 'r');
    
    if ($archivo === false) {
        throw new Exception("No se pudo abrir registros.txt");
    }
    
    $numeroLinea = 0;
    
    while (($linea = fgets($archivo)) !== false) {
        $numeroLinea++;
        
        // Limpiar saltos de línea
        $linea = trim($linea);
        
        // Si la línea está vacía, saltarla
        if (empty($linea)) {
            continue;
        }
        
        try {
            // Separar por |
            $campos = explode('|', $linea);
            
            // Debe tener 5 campos: fecha, nombre, email, edad, comentario
            if (count($campos) != 5) {
                throw new Exception("Línea $numeroLinea mal formateada (tiene " . count($campos) . " campos en vez de 5)");
            }
            
            // Limpiar espacios de cada campo
            $fecha = trim($campos[0]);
            $nombre = trim($campos[1]);
            $email = trim($campos[2]);
            $edad = trim($campos[3]);
            $comentario = trim($campos[4]);
            
            // Guardar el registro
            $registros[] = array(
                'fecha' => $fecha,
                'nombre' => $nombre,
                'email' => $email,
                'edad' => $edad,
                'comentario' => $comentario
            );
            
        } catch (Exception $e) {
            // Error en una línea específica
            $fechaLog = date('Y-m-d H:i:s');
            $log = "$fechaLog | EJ30 | " . $e->getMessage() . " | ej30.php | $numeroLinea\n";
            file_put_contents('errores.log', $log, FILE_APPEND);
        }
    }
    
    fclose($archivo);
    
    // Si no hay registros válidos
    if (count($registros) == 0) {
        $mensaje = "No hay registros válidos en el archivo";
    }
    
} catch (Exception $e) {
    // Error general (archivo no existe, etc.)
    $hayError = true;
    $mensaje = $e->getMessage();
    
    // Guardar en log
    $fechaLog = date('Y-m-d H:i:s');
    $log = "$fechaLog | EJ30 | " . $e->getMessage() . " | ej30.php | " . $e->getLine() . "\n";
    file_put_contents('errores.log', $log, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Registros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 30px auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        .mensaje {
            padding: 15px;
            margin: 20px 0;
            border-radius: 3px;
            text-align: center;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .info {
            background-color: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }
        
        table {
            width: 100%;
            background-color: white;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        
        th {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f5f5f5;
        }
        
        .total {
            margin-top: 10px;
            text-align: right;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    <h1>📋 Listado de Registros</h1>
    
    <?php if ($mensaje != ''): ?>
        <div class="mensaje <?php echo $hayError ? 'error' : 'info'; ?>">
            <?php echo $mensaje; ?>
        </div>
    <?php endif; ?>
    
    <?php if (count($registros) > 0): ?>
        
        <table>
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Edad</th>
                    <th>Comentario</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($registros as $registro): ?>
                    <tr>
                        <td><?php echo $registro['fecha']; ?></td>
                        <td><?php echo $registro['nombre']; ?></td>
                        <td><?php echo $registro['email']; ?></td>
                        <td><?php echo $registro['edad']; ?></td>
                        <td><?php echo $registro['comentario']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div class="total">
            Total de registros: <?php echo count($registros); ?>
        </div>
        
    <?php endif; ?>
    
</body>
</html>