<?php
class Carrito {
    public $productos = array();

    public function agregarProducto($nombre, $precio, $cantidad) {
        $this->productos[$nombre] = array("precio"=>$precio,"cantidad"=>$cantidad);
    }

    public function quitarProducto($nombre) {
        unset($this->productos[$nombre]);
    }

    public function mostrarDetalle() {
        foreach ($this->productos as $n=>$p) {
            echo "$n - ".$p["cantidad"]." x ".$p["precio"]." €<br>";
        }
        echo "Total: ".$this->calcularTotal()." €<br>";
    }

    public function calcularTotal() {
        $total = 0;
        foreach ($this->productos as $p) $total += $p["precio"]*$p["cantidad"];
        return $total;
    }
}

$carrito = new Carrito();

// Detectamos acción enviada
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["accion"])) {
        $accion = $_POST["accion"];

        if ($accion == "agregar") {
            $carrito->agregarProducto($_POST["nombre"], $_POST["precio"], $_POST["cantidad"]);
        } elseif ($accion == "quitar") {
            $carrito->quitarProducto($_POST["quitar"]);
        }
    }
}
?>

<h2>Tienda Online - Nivel Principiante</h2>

<h3>Agregar producto</h3>
<form method="post">
    <input type="hidden" name="accion" value="agregar">
    Nombre: <input type="text" name="nombre"><br>
    Precio: <input type="number" name="precio"><br>
    Cantidad: <input type="number" name="cantidad"><br>
    <button type="submit">Agregar</button>
</form>

<h3>Quitar producto</h3>
<form method="post">
    <input type="hidden" name="accion" value="quitar">
    Nombre: <input type="text" name="quitar"><br>
    <button type="submit">Quitar</button>
</form>

<h3>Carrito:</h3>
<?php
$carrito->mostrarDetalle();
?>
