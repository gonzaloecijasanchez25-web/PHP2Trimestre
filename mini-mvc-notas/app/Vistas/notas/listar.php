<h2>Listado de Notas</h2>

<?php if (isset($error)): ?>
    <div class="error">
        <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<?php if (empty($notas)): ?>
    <p>No hay notas disponibles. ¡Crea tu primera nota!</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Texto</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas as $nota): ?>
                <tr>
                    <td><?php echo htmlspecialchars($nota->fecha); ?></td>
                    <td><?php echo htmlspecialchars($nota->texto); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>