<?php
$estado = $_GET["estado"];
$valor = $_GET["valor"];
$numero = $_POST['numero'];

$mod = $numero % 2;
echo "Estado: $estado $valor<br>";
if ($mod == 0) {
    echo "El numero es par";
} else {
    echo "El numero es impar";
}

?>