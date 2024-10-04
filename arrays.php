<?php

$provincias = ['Sevilla', 'Almería', 'Granada', "Jaén", "Huelva", 'Cádiz', "Córdoba"];
$valores = array("uno", "dos", "tres"); //Es lo mismo pero está desfasado. Puedes usar una u otra.

echo "El tipo de provincias es: ".gettype($provincias)."<br>";

// Para mostrar lo que contiene un array
print_r($provincias);
echo "<br>";
var_dump($provincias); // Esta sirve para cualquier variable u objeto. Añade información sobre el mismo. Depuración y demás.
echo "<br>";

// Elementos de un array
echo "El array provincias tiene ".count($provincias). " elementos."; // Así se cuenta el número de elementos de un array

echo "<hr>";

for($i = 0 ; $i < count($provincias) ; $i++) {
    if ($i == count($provincias)-1) {
        echo $provincias[$i]. ".";
    } else {
        echo $provincias[$i]. ", ";
    }
}

// Si queremos acceder a una provincia concreta
echo "<br> La provincia de Índice 2 es: ".$provincias[2]. ".";

// Podemos mostrar en pantalla un elemento solo del array podemos meterlo directamente en el echo. Da error si metemos el array solo.
echo "<br> La provincia de Índice 2 es: {$provincias[2]}";
// Recomendable meterlo entre llaves    ^              ^

echo "<hr>";

$provincias[] = "Madrid"; // Lo pushea al final.

print_r($provincias);
echo "<br>";
$provincias[0] = "Hispalis"; // Lo machaca.
print_r($provincias);

echo "<hr>";

$provincias[19] = "Murcia";
print_r($provincias); // Pasa del índice al 19. No hay nada entre medias. Pero esto puede ser problemático...

for($i = 0 ; $i < count($provincias) ; $i++) {
    if ($i == count($provincias)-1) {
        echo $provincias[$i]. ".";
    } else {
        echo $provincias[$i]. ", ";
    }
} // No hay indices entre medias y te da un Warning

$provincias[] = "Valencia";
// Esto no rellena ninguno de los de en medio, solo lo mete al final.
print_r($provincias);

// ------------------------------------
echo "<hr>";
$provincias[-23] = "Oh no"; // Con esto no pasa nada, lo mete al final.
$provincias[8] = "León"; // Y aquí también. No los ordena.
print_r($provincias);

echo "<br>";

$provincias[] = 34;
$provincias[] = true;
$provincias[] = 34.45;

echo "<br>";

var_dump($provincias);

//----------------------------
// Usamos un foreach para recorrer el array elemento a elemento sin problemas, solo los valores.
echo "<hr>";
foreach($provincias as $prov){
    echo "$prov<br>";
}

//----------------------------
// Usamos un foreach para recorrer el array elemento a elemento sin problemas y ahora mostraremos también los índices.
echo "<hr>";
foreach($provincias as $indice=>$valor){
    echo "Indice = $indice, valor = $valor<br>";
}

// Arrays Asociativos

$nombres = [
    'usuario1' => 'Juan',
    'usuario2' => 'Pedro',
    'usuario3' => 'Ana'
];

echo "<hr><hr><hr>";
echo $nombres['usuario1'];
$nombres['usuario4'] = 'Lola';
echo "<br>";
print_r($nombres);

$nombres[] = 'Juan';
echo "<br>";
$nombres['usuario24'] = 'Zacarias';
print_r($nombres);

//---------
echo "<hr>";
foreach ($nombres as $nombre) {
    echo $nombre."<br>";
}
foreach ($nombres as $indice=>$valor) {
    echo "indice = $indice, valor = $valor<br>";
}


// Opcional cerrar el <?php porque no metemos nada de html
 