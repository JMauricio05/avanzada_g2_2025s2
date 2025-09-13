<?php
$numeros = [1, 2, 3, 4, 5, 6, 7, 8];

echo "For--------------<br>";
for ($index = 0; $index < count($numeros); $index++) {
    echo $numeros[$index] . "<br>";
}

echo "while--------------<br>";
$index = 0;
while ($index < count($numeros)) {
    echo $numeros[$index] . "<br>";
    $index++;
}

echo "do while--------------<br>";
$index = 0;
do {
    echo $numeros[$index] . "<br>";
    $index++;
} while ($index < count($numeros));

echo "foreach--------------<br>";
foreach ($numeros as $valor) {
    echo $valor . "<br>";
}

foreach ($numeros as $index => $valor) {
    //break;
    // if ($index == 2) {
    //     continue;
    // }
    echo "$index: $valor<br>";
}

?>