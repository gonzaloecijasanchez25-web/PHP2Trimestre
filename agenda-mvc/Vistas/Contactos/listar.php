<h2>Lista de Contactos</h2>

<?php if (isset($error)): ?>
    <p class="error"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>

<?php if (empty($contactos)): ?>
    <p>No hay contactos</p>
<?php else: ?>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Teléfono</th>
            <th>Fecha</th>
        </tr>
        <?php foreach ($contactos as $c): ?>
            <tr>
                <td><?php echo htmlspecialchars($c->nombre); ?></td>
                <td><?php echo htmlspecialchars($c->telefono); ?></td>
                <td><?php echo htmlspecialchars($c->fecha); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>