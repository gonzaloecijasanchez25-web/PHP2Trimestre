<?php
class CuentaBancaria {
    public $titular;
    public $saldo;
    public $tipoDeCuenta;

    public function __construct($titular, $saldo, $tipoDeCuenta) {
        $this->titular = $titular;
        $this->saldo = $saldo;
        $this->tipoDeCuenta = $tipoDeCuenta;
    }

    public function depositar($cantidad) {
        $this->saldo += $cantidad;
    }

    public function retirar($cantidad) {
        if ($cantidad <= $this->saldo) {
            $this->saldo -= $cantidad;
        }
    }

    public function mostrarInfo() {
        echo "Titular: $this->titular<br>";
        echo "Tipo de cuenta: $this->tipoDeCuenta<br>";
        echo "Saldo: $this->saldo €<br>";
    }
}

$cuenta = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $saldo = $_POST["saldo"];
    $tipo = $_POST["tipo"];

    $cuenta = new CuentaBancaria($nombre, $saldo, $tipo);

    if (!empty($_POST["depositar"])) $cuenta->depositar($_POST["depositar"]);
    if (!empty($_POST["retirar"])) $cuenta->retirar($_POST["retirar"]);
}
?>

<h2>Banco – Cuenta Bancaria</h2>

<form method="post">
    Nombre: <input type="text" name="nombre"><br><br>
    Saldo inicial: <input type="number" name="saldo"><br><br>
    Tipo de cuenta: <input type="text" name="tipo"><br><br>
    Depositar: <input type="number" name="depositar"><br><br>
    Retirar: <input type="number" name="retirar"><br><br>
    <button type="submit">Crear / Actualizar cuenta</button>
</form>

<?php
if ($cuenta != null) {
    echo "<h3>Información actualizada:</h3>";
    $cuenta->mostrarInfo();
}
?>
