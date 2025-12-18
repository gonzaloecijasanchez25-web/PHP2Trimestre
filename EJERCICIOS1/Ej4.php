<?php
$respuestasCorrectas = [
    "p1" => "b",
    "p2" => "a",
    "p3" => "c"
];

$nota = 0;
?>

<form method="post">
<p>1. PHP es...</p>
<input type="radio" name="p1" value="a"> Lenguaje de marcas<br>
<input type="radio" name="p1" value="b"> Lenguaje de servidor<br>
<input type="radio" name="p1" value="c"> Base de datos<br>

<p>2. $_POST sirve para...</p>
<input type="radio" name="p2" value="a"> Recoger datos<br>
<input type="radio" name="p2" value="b"> Imprimir HTML<br>

<p>3. Un array asociativo usa...</p>
<input type="radio" name="p3" value="a"> Índices numéricos<br>
<input type="radio" name="p3" value="c"> Clave y valor<br>

<button>Corregir</button>
</form>

<?php
if ($_POST) {
    foreach ($respuestasCorrectas as $pregunta => $correcta) {
        if (isset($_POST[$pregunta]) && $_POST[$pregunta] == $correcta) {
            $nota++;
        }
    }

    echo "<p>Has sacado un $nota de 3</p>";
}
?>






