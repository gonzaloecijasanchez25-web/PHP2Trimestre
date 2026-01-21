<?php
// Clase padre
class Notificacion {
    public $mensaje;
    
    public function __construct($mensajeNotificacion) {
        $this->mensaje = $mensajeNotificacion;
    }
    
    public function enviar() {
        echo "Enviando: " . $this->mensaje . "<br>";
    }
}

// Clase hija
class Email extends Notificacion {
    public $destinatario;
    
    public function __construct($mensajeEmail, $destinoEmail) {
        // Llamamos al constructor del padre
        parent::__construct($mensajeEmail);
        
        // Asignamos el atributo propio
        $this->destinatario = $destinoEmail;
    }
    
    // Sobreescribimos el método enviar()
    public function enviar() {
        // Primero mostramos información propia del Email
        echo "Para: " . $this->destinatario . "<br>";
        
        // Llamamos al método del padre para el mensaje
        parent::enviar();
    }
}

// Prueba del ejercicio
echo "<br><strong>Ejercicio 5: El Sistema de Notificaciones</strong><br><br>";

// Crear un Email
$email1 = new Email("Hola, ¿cómo estás?", "cliente@web.com");
echo "Enviando email:<br>";
$email1->enviar();

echo "<br>";

// Otro ejemplo
$email2 = new Email("Tu pedido ha sido enviado", "usuario@gmail.com");
echo "Enviando notificación:<br>";
$email2->enviar();

echo "<br>";

// ¿Qué pasa si usamos la clase padre directamente?
echo "Notificación simple (clase padre):<br>";
$notificacionSimple = new Notificacion("Mensaje de prueba");
$notificacionSimple->enviar();
?>