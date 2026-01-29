<h2>Crear Nueva Nota</h2>

<?php if (isset($error)): ?>
    <div class="error">
        Error: <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<form method="POST" action="index.php?accion=guardar">
    <div>
        <label for="texto">Texto de la nota (3-80 caracteres):</label><br>
        <textarea 
            name="texto" 
            id="texto" 
            placeholder="Escribe tu nota aquí..."
            required
        ><?php echo htmlspecialchars($antiguos['texto'] ?? ''); ?></textarea>
    </div>
    
    <div>
        <button type="submit">Guardar Nota</button>
        <a href="index.php?accion=listar" style="margin-left: 10px;">Cancelar</a>
    </div>
</form>