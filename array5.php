<?php

// Ejercicio 1. En una variable $filas guardaremos un número entre 10 y 15
// ambos incluidos, en otra $columnas guardaremos un valor entre 5 y 10
// pintaremos una tabla de $filas y $columnas y dentro de cada celda
// pondremos un número consecutivo, empezando por 1 y acabando en $filas x $columnas

$filas = random_int(10,15);
$columnas = random_int(5,10);
$contador = 1;

echo "<h1 align=center>Tabla de $filas X $columnas</h1>";
echo "<table align=center border=1 cellspacing=3 cellpadding=6>";
for ($i = 0 ; $i < $filas ; $i++) {
    echo "<tr>";
    for ($j = 0 ; $j < $columnas ; $j++) {
        echo <<< TBL
            <td>$contador</td>
        TBL;
        $contador++;
    }
    echo "</tr>";
}
echo "</table>";

// Ejercicio 2. Haremos una tabla en las mismas condiciones que la anterior
// pero ahora las celdas con números pares las pondremos de color 'aqua'
// y con números impares de color 'silver'

echo "<br>";
$filas = random_int(10,15);
$columnas = random_int(5,10);


$contador = 1;

echo "<h1 align=center>Tabla de $filas X $columnas</h1>";
echo "<table border=1 align=center cellspacing=4 cellpadding=6>";

for ($i = 0 ; $i < $filas ; $i++) {
    echo "<tr>";
        for($j = 0 ; $j < $columnas ; $j++) {
            if ($contador % 2 == 0) {
                echo "<td style='background-color:aqua'>$contador</td>";
            } else {
                echo "<td style='background-color:silver'>$contador</td>";
            }
            $contador++;
        }
    echo "</tr>";
}
    echo "</table>";


// Ejercicio 3. Haremos una tabla con las mismas condiciones que la anterior pero
// ahora las celdas con números primos las pintaremos de rojo y el resto de celdas
// de blanco
// <td style'background-color: el que sea'></td>

echo "<br>";
$filas = random_int(10, 15);
$columnas = random_int(5, 10);

$contador = 1;

echo "<h1 align=center><u>Tabla de $filas X $columnas</u></h1>";
echo "<table align=center border=1 cellspacing=3 cellpadding=8>";

for ($i = 0; $i < $filas; $i++) {
    echo "<tr>";
    for ($j = 0; $j < $columnas; $j++) {
        $flag = true;
        for ($k = 2; $k < $contador; $k++) {
            if ($contador % $k == 0) {
                $flag = false;
                break;
            }
        }
        echo ($flag) ? "<td style='background-color:red'>$contador</td>" : "<td>$contador</td>";
        $contador++;
    }
    echo "</tr>";
}
echo "</table>";



// Ejercicio 4 .- Hacer un tablero de ajedrez en una tabla htm
// (8 x 8) alternando negras y blancas

$filas = 8;
$columnas = 8;

$blanco = "<td>&nbsp&nbsp&nbsp&nbsp</td>";
$negro = "<td style='background-color:black'>&nbsp&nbsp&nbsp&nbsp</td>";

echo "<h1 align=center>Tablero de Ajedrez</h1>";
echo "<table align=center border=3 cellspacing=2 cellpadding=6>";

for ($i = 1 ; $i <= $filas ; $i++) {
    echo "<tr>";
    for ($j = 1 ; $j <= $columnas ; $j++) {
        if ($i % 2 == 0) {
            echo ($j % 2 == 0) ? $negro : $blanco;
        } 
        if (!($i % 2 == 0)) {
            echo ($j % 2 == 0) ? $blanco : $negro;
        }        
    }
    echo "</tr>";

}
echo "</table>";

// Ejercicio 5.- Buscaremos los primeros 1000 numeros primos (el 1 NO lo consideramos primo)
// y los meteremos en un array de 50 x 20 y los mostraremos en una tabla html de 50 x 20

$elArray = [];
$arrayFilas = [];

$final = 2;
$contador = 20;
$filas = 50;
$inicio = 0;

do {
    for ($i = 1 ; $i <= $contador ; $i++) {
        for ($j = $final ; ; $j++) {
            $esPrimo = true;
            for ($k = 2 ; $k < $j ; $k++) {
                if ($j % $k == 0) {
                    $esPrimo = false;
                    $final++;
                    break;
                }
            }
            if($esPrimo) {
                array_push($arrayFilas, $j);
                $final++;
                break;
            }
        }
    }
    array_push($elArray, $arrayFilas);
    $arrayFilas = [];
    $inicio++;
} while ($inicio < $filas);

echo "<h1 align=center>Tabla de 1000 números primos</h1>";
echo "<table border=1 align=center cellspacing=3 cellpadding=3>";

foreach ($elArray as $valor) {
    echo "<tr>";
        foreach ($valor as $element) {
            echo "<td>$element</td>";
        }
    echo "</tr>";
}
echo "<table/>";