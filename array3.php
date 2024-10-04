<?php
$andalucia = [
    'Almería',
    'Cádiz',
    'Córdoba',
    'Huelva',
    'Granada',
    'Jaén',
    'Sevilla',
];

$extremadura = ['Badajoz', 'Cáceres'];
$valencia = ["Valencia", "Castellón", "Alicante"];
$madrid = ["Madrid"];
$galicia = ["La Coruña", "Lugo", "Ourense", "Pontevedra"];

/* $comunidades = [
    'Andalucia' => $andalucia,
    'Extremadura' => $extremadura,
    'Comunidad Valenciana' => $valencia,
    'Madrid' => $madrid
]; */ 
// También para esto podríamos haber hecho 
$comunidades = compact('andalucia', 'extremadura', 'valencia', 'madrid', 'galicia');

var_dump($comunidades);

// Crear tablas con una fila con el nombre de la comunidad y la otra con el número de columnas/celdas con el nombre de las provincias.
// Foreach podría ser útil (º____º    )

print_r($comunidades);

echo "<hr>";
foreach ($comunidades as $indice => $nombre) { // de comunidades, valores como andalucia, extremadura... y el nombre como el array de cada uno.
    $columna = count($nombre); // contamos el número de items dentro de Andalucia (8)

    echo <<< TBL1
    <table border=3>
        <tr >
            <td colspan=$columna align=center bgcolor=silver>$indice</td>
        </tr>
        <tr>
    TBL1;
    foreach ($nombre as $valor) { //Nos metemos dentro del array de andalucia (por ejemplo) y cogemos todos los valores de dentro.
        echo "<td>".$valor."</td>";
    }
    echo "</tr></table> <br>";
}

/* $aux = count($andalucia);

echo <<< TBL1
    <table border=3 cellspacing=3 cellpadding=3>
        <tr >
            <td colspan=$aux align=center>Andalucia</td>
        </tr>
        <tr>
TBL1;
for ($i = 0 ; $i < $aux ; $i++) {
    echo "<td>".$andalucia[$i]."</td>";
    if ($i == $aux-1) {
        echo "</tr></table>";
    }
}; */

echo "<hr>";

// Y esto es para hacerlo en plan lista
foreach ($comunidades as $indice => $nombre) {
    echo <<< LST
        <ul>
            <li>$indice</li>
        </ul>
        <ol>
    LST;
    foreach ($nombre as $valor) {
        echo "<li>".$valor."</li>";
    }
    echo "</ol>";
}


/* 
 <ol>
    <li></li>
 </ol>
 <ul>
    <li></li>
 </ul>
 
 echo "<ul><li>".$values."</li></ul>

*/