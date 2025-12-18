<?php
$fondo = $_POST["fondo"] ?? "#ffffff";
$size = $_POST["size"] ?? "24";
$texto = $_POST["texto"] ?? "Mi Web";
$align = $_POST["align"] ?? "center";
?>

<form method="post">
    Color fondo: <input type="color" name="fondo"><br>
    Tamaño letra: <input type="number" name="size"><br>
    Texto título: <input type="text" name="texto"><br>
    Alineación:
    <select name="align">
        <option value="center">Center</option>
        <option value="left">Left</option>
        <option value="right">Right</option>
    </select><br>
    <button>Aplicar</button>
</form>

<body style="background-color:<?= $fondo ?>;">
    <h1 style="font-size:<?= $size ?>px; text-align:<?= $align ?>;">
        <?= $texto ?>
    </h1>
</body>