<?php
$productos = [
    "Manzana" => 1.5,
    "Naranja" => 2.0,
    "Sandía" => 5.0
];

$total = 0;
?>

<form method="post">
<?php foreach ($productos as $nombre => $precio): ?>
    <?= $nombre ?> (<?= $precio ?> €):
    <input type="number" name="cantidad_<?= $nombre ?>" min="0"><br>
<?php endforeach; ?>
    <button>Comprar</button>
</form>

<?php if ($_POST): ?>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Total</th>
    </tr>

<?php foreach ($productos as $nombre => $precio):
    $cantidad = $_POST["cantidad_" . $nombre];
    $linea = $cantidad * $precio;
    $total += $linea;
?>
<tr>
    <td><?= $nombre ?></td>
    <td><?= $cantidad ?></td>
    <td><?= $linea ?> €</td>
</tr>
<?php endforeach; ?>
</table>

<p>Total final: <?= $total ?> €</p>
<?php endif; ?>
