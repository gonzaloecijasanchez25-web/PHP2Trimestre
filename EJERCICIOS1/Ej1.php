<?php
$usuarios = [
    ["user" => "admin", "pass" => "1234"],
    ["user" => "pepe", "pass" => "hola"],
    ["user" => "ana", "pass" => "secreto"]
];

$mensaje = "";
$color = "";

if ($_POST) {
    $encontrado = false;

    foreach ($usuarios as $u) {
        if ($_POST["usuario"] == $u["user"] && $_POST["password"] == $u["pass"]) {
            $encontrado = true;
            $mensaje = "Bienvenido al sistema, " . $u["user"];
            $color = "green";
        }
    }

    if (!$encontrado) {
        $mensaje = "Acceso denegado";
        $color = "red";
    }
}
?>

<form method="post">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <button>Entrar</button>
</form>

<p style="color:<?= $color ?>"><?= $mensaje ?></p>