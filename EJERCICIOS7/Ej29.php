<?php
// EJERCICIO 29 - Formulario con validación y guardado

// Variables para mensajes
$mensaje = '';
$error = false;

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    try {
        // Recoger datos del formulario
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $edad = $_POST['edad'];
        $comentario = $_POST['comentario'];
        
        // VALIDACIONES
        
        // Validar nombre
        if (empty($nombre)) {
            throw new Exception("El nombre es obligatorio");
        }
        if (strlen($nombre) < 3) {
            throw new Exception("El nombre debe tener al menos 3 caracteres");
        }
        
        // Validar email
        if (empty($email)) {
            throw new Exception("El email es obligatorio");
        }
        if (strpos($email, '@') === false || strpos($email, '.') === false) {
            throw new Exception("El email no es válido");
        }
        
        // Validar edad
        if (empty($edad)) {
            throw new Exception("La edad es obligatoria");
        }
        if (!is_numeric($edad)) {
            throw new Exception("La edad debe ser un número");
        }
        if ($edad < 0 || $edad > 120) {
            throw new Exception("La edad debe estar entre 0 y 120");
        }
        
        // Validar comentario (opcional pero con límite)
        if (strlen($comentario) > 200) {
            throw new Exception("El comentario no puede tener más de 200 caracteres");
        }
        
        // Si llegamos aquí, todo está OK
        // Guardar en archivo registros.txt
        
        $fecha = date('Y-m-d H:i:s');
        $linea = "$fecha | $nombre | $email | $edad | $comentario\n";
        
        $resultado = file_put_contents('registros.txt', $linea, FILE_APPEND);
        
        if ($resultado === false) {
            throw new Exception("No se pudo guardar en el archivo");
        }
        
        // Todo bien
        $mensaje = "Registro guardado correctamente";
        
    } catch (Exception $e) {
        // Hay un error
        $error = true;
        $mensaje = $e->getMessage();
        
        // Guardar error en errores.log
        $fecha = date('Y-m-d H:i:s');
        $archivo = basename(__FILE__);
        $linea_error = $e->getLine();
        $log = "$fecha | EJ29 | $mensaje | $archivo | $linea_error\n";
        
        file_put_contents('errores.log', $log, FILE_APPEND);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        
        .contenedor {
            background-color: white;
            padding: 30px;
            border-radius: 5px;
        }
        
        h1 {
            color: #333;
        }
        
        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }
        
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
        }
        
        textarea {
            height: 80px;
        }
        
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .mensaje {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 3px;
        }
        
        .exito {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        
        .obligatorio {
            color: red;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <h1>Formulario de Registro</h1>
        
        <?php if ($mensaje != ''): ?>
            <div class="mensaje <?php echo $error ? 'error' : 'exito'; ?>">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            
            <label>
                Nombre <span class="obligatorio">*</span>
            </label>
            <input type="text" name="nombre" placeholder="Mínimo 3 caracteres">
            
            <label>
                Email <span class="obligatorio">*</span>
            </label>
            <input type="text" name="email" placeholder="ejemplo@correo.com">
            
            <label>
                Edad <span class="obligatorio">*</span>
            </label>
            <input type="number" name="edad" placeholder="Entre 0 y 120">
            
            <label>
                Comentario (opcional, máx. 200 caracteres)
            </label>
            <textarea name="comentario" placeholder="Escribe tu comentario aquí..."></textarea>
            
            <button type="submit">Enviar</button>
            
        </form>
    </div>
</body>
</html>