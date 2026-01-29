<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini MVC - Notas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .error { color: red; background: #ffe6e6; padding: 10px; border-radius: 5px; }
        .success { color: green; background: #e6ffe6; padding: 10px; border-radius: 5px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; color: #0066cc; }
        nav a:hover { text-decoration: underline; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        textarea { width: 100%; height: 100px; margin: 10px 0; }
        button { background: #0066cc; color: white; border: none; padding: 10px 20px; cursor: pointer; }
        button:hover { background: #0052a3; }
    </style>
</head>
<body>
    <h1>Mini MVC - Gestor de Notas</h1>
    
    <nav>
        <a href="index.php?accion=listar">Listar Notas</a>
        <a href="index.php?accion=crear">Crear Nota</a>
    </nav>

    <main>
        <?php require $vistaContenido; ?>
    </main>
</body>
</html>