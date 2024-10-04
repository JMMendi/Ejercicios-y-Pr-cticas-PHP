<?php
// Rellenamos con números enteros aleatorios entre 0 y 30 (random_int()) un array de 20 elementos

// Creamos otro array con sus cuadrados

// Y otro con sus cubos

// Mostramos en una tabla de tres columnas los tres arrays
// Primera columna el array origina, la segunda los cuadrados y la tercera los cubos

$arrayOriginal = [];
$arrayCuadrados = [];
$arrayCubos = [];
$contador = 20;
$i = 0;

do {
    $numeroAleatorio = random_int(1, 30);
    if (!in_array($numeroAleatorio, $arrayOriginal)) {
        array_push($arrayOriginal, $numeroAleatorio);
        array_push($arrayCuadrados, pow($arrayOriginal[$i], 2));
        array_push($arrayCubos, pow($arrayOriginal[$i], 3));
        $contador--;
        $i++;
    }
} while ($contador > 0);


echo <<< TBL
    <table align=center border=2 cellpadding=3 cellspacing=3>
        <tr bgcolor=silver>
            <td>Original</td>
            <td>Cuadrados</td>
            <td>Cubos</td>
        </tr>
TBL;

for ($i = 0; $i < count($arrayOriginal); $i++) {
    echo <<< INT
        <tr>
            <td>$arrayOriginal[$i]</td>
            <td>$arrayCuadrados[$i]</td>
            <td>$arrayCubos[$i]</td>
        </tr>
    INT;
}
echo "</table>";

// Ahora sin que se repitan elementos
