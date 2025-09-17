<?php
$edad = 20;

if ($edad < 17) {
    echo "Menor de edad";
} else if ($edad < 20) {
    echo "menor a 20";
} elseif ($edad < 25) {
    echo "menor a 25";
} else {
    echo "mayor de edad";
}

$categoria = "a";
switch ($categoria) {
    case "a":
        //codigo...
        break;
    case "b":
        //codigo
        break;
    default:
        //codigo
        break;
}
?>