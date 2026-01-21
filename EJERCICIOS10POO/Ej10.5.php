<?php
class Notificacion {
    public $mensaje;
    public function __construct($mensaje) { $this->mensaje = $mensaje; }
    public function enviar() { echo "Enviando: $this->mensaje<br>"; }
}

class Email extends Notificacion {
    public $destinatario;
    public function __construct($mensaje, $destinatario) {
        parent::__construct($mensaje);
        $this->destinatario = $destinatario;
    }
    public function enviar() {
        echo "Para: $this->destinatario<br>";
        parent::enviar();
    }
}

$email = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = new Email($_POST["mensaje"], $_POST["destinatario"]);
}
?>

<h2>Ej9.5 – Email</h2>
<form method="post">
    Mensaje: <input type="text" name="mensaje"><br><br>
    Destinatario: <input type="text" name="destinatario"><br><br>
    <button type="submit">Enviar Email</button>
</form>

<?php
if ($email) $email->enviar();
?>
