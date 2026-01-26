<h2>Nuevo Contacto</h2>

<?php if (isset($error)): ?>
    <p class="error"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<form method="POST" action="index.php?accion=guardar">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" value="<?php echo htmlspecialchars($antiguos['nombre'] ?? ''); ?>" size="40">
    <br><br>
    
    <label>Teléfono:</label><br>
    <input type="text" name="telefono" value="<?php echo htmlspecialchars($antiguos['telefono'] ?? ''); ?>" size="40">
    <br><br>
    
    <button type="submit">Guardar</button>
</form>