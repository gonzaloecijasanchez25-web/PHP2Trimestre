<?php
class Login {
    public $usuario;
    public $password;
    
    public function __construct($nombreUsuario, $contrasena) {
        $this->usuario = $nombreUsuario;
        $this->password = $contrasena;
    }
    
    public function comprobar() {
        if ($this->password == "1234") {
            echo "Acceso concedido a " . $this->usuario . ".<br>";
        } else {
            echo "Contraseña incorrecta para " . $this->usuario . ".<br>";
        }
    }
}

// Prueba del ejercicio
echo "<br><strong>Ejercicio 3: El Login de Usuario</strong><br><br>";

// Caso 1: Contraseña correcta
$usuario1 = new Login("Ana", "1234");
$usuario1->comprobar();

// Caso 2: Contraseña incorrecta
$usuario2 = new Login("Pedro", "abcd");
$usuario2->comprobar();

// Caso 3: Otro intento
$usuario3 = new Login("Admin", "admin123");
$usuario3->comprobar();
?>