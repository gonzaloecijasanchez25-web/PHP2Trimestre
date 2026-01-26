<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>
    <style>
        body { font-family: Arial; margin: 20px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 15px; text-decoration: none; color: blue; }
        table { border-collapse: collapse; width: 100%; }
        table td, table th { border: 1px solid #ccc; padding: 8px; }
        .error { color: red; margin: 10px 0; }
        input, button { padding: 5px; margin: 5px 0; }
    </style>
</head>
<body>
    <h1>Agenda de Contactos</h1>
    
    <nav>
        <a href="index.php?accion=listar">Ver contactos</a>
        <a href="index.php?accion=crear">Nuevo contacto</a>
    </nav>
    
    <hr>
    
    <?php require $vistaContenido; ?>
    
</body>
</html>