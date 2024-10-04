<?php

// Ordenación de Arrays
// sort, rsort, asort, arsort, ksort, krsort, natsort

// 1- Sort (Se suele utilizar para arrays "NO" asociativos)

$nombres = ["manolo", "juan", "ana", "zacarias", "pedro"];
echo "<center><b><u>Método sort</u></b></center>";
echo "array nombres antes de su ordenación con <b>sort</b>:";
var_dump($nombres);
sort($nombres);

echo "<br>array nombres después de su ordenación con <b>sort</b>";
var_dump($nombres);

// 2- RSort (Se suele utilizar para arrays "NO" asociativos)

$nombres = ["manolo", "juan", "ana", "zacarias", "pedro"];
echo "<center><b><u>Método rsort</u></b></center>";
echo "array nombres antes de su ordenación con <b>rsort</b>:";
var_dump($nombres);
rsort($nombres);

echo "<br>array nombres después de su ordenación con <b>rsort</b>";
var_dump($nombres);

// 3 - ASort (Ordena los valores (A-Z) NO las claves)

$usuarios = [
    "manolo" => "manolo@email.es",
    "user56" => "juan@email.es",
    "zasca23" => "ana@email.es",
    "ana34" => "anamaria@email.es",
    "pedIto" => "zacariaspedrito@email.es"
];

echo "<center><b><u>Método asort</u></b></center>";
echo "array usuarios antes de su ordenación con <b>asort</b>:";
var_dump($usuarios);
asort($usuarios);

echo "<br>array usuarios después de su ordenación con <b>asort</b>";
var_dump($usuarios);

// IMPORTANTE, si usamos rsort MACHACA las claves
echo "<br>array usuarios después de su ordenación con <b>rsort</b>";
rsort($usuarios);
var_dump($usuarios);

// 4 - ARSort (Ordena los valores (Z-A) NO las claves)

$usuarios = [
    "manolo" => "manolo@email.es",
    "user56" => "juan@email.es",
    "zasca23" => "ana@email.es",
    "ana34" => "anamaria@email.es",
    "pedIto" => "zacariaspedrito@email.es"
];

echo "<center><b><u>Método arsort</u></b></center>";
echo "array usuarios antes de su ordenación con <b>arsort</b>:";
var_dump($usuarios);
arsort($usuarios);

echo "<br>array usuarios después de su ordenación con <b>arsort</b>";
var_dump($usuarios);

// 5 - KSort (Ordena las claves (A-Z) NO los valores)

$usuarios = [
    "manolo" => "manolo@email.es",
    "user56" => "juan@email.es",
    "zasca23" => "ana@email.es",
    "ana34" => "anamaria@email.es",
    "pedIto" => "zacariaspedrito@email.es"
];

echo "<center><b><u>Método ksort</u></b></center>";
echo "array usuarios antes de su ordenación con <b>ksort</b>:";
var_dump($usuarios);
ksort($usuarios);

echo "<br>array usuarios después de su ordenación con <b>ksort</b>";
var_dump($usuarios);

// 6 - KRSort (Ordena las claves (Z-A) NO los valores)

$usuarios = [
    "manolo" => "manolo@email.es",
    "user56" => "juan@email.es",
    "zasca23" => "ana@email.es",
    "ana34" => "anamaria@email.es",
    "pedIto" => "zacariaspedrito@email.es"
];

echo "<center><b><u>Método krsort</u></b></center>";
echo "array usuarios antes de su ordenación con <b>krsort</b>:";
var_dump($usuarios);
krsort($usuarios);

echo "<br>array usuarios después de su ordenación con <b>krsort</b>";
var_dump($usuarios);

// 6 - NATSort (Ordena primero las mayúsculas que las minúsculas)

$nombres = ["Manolo", "juan", "Ana", "zacarias", "Pedro"];
echo "<center><b><u>Método natsort</u></b></center>";
echo "array nombres antes de su ordenación con <b>natsort</b>:";
var_dump($nombres);
natsort($nombres);

echo "<br>array nombres después de su ordenación con <b>natsort</b>";
var_dump($nombres);

// Algunas funciones de array interesantes
// implode, explode, count, compact
// array_push() y array_pop() <---- añade y quita al final de un array

$array = ["uno", "dos", "tres", "cuatro"];

echo "Aquí tenemos un array normalico...";
var_dump($array);

echo "<br> Con array_push() metemos el cinco!";
array_push($array, "cinco");
var_dump($array);

echo "<br> Y con array_pop() quitamos el cinco!";
echo "<br>".array_pop($array)."<br>"; // Lo quita y lo puedes devolver si quieres
var_dump($array);

// array_unshift añade un elemento al PRINCIPIO de un array
// array_shift quita un elemento al PRINCIPIO de un array
echo "<br>Array shit y unshift<br>";
$array = ["uno", "dos", "tres", "cuatro"];
var_dump($array);

echo "Y ahora está el cero";
array_unshift($array, "cero");
var_dump($array);

echo "Y finalmente lo quitaremos con el shift";
array_shift($array); // también lo puede devolver como el array pop
var_dump($array);

// Desordenando arrays (for fun!)
// shuffle

echo "<br>Dado el array números, le hacemos un SHUFFLE TIIIIIIIME<br>";
$numeros = [1,2,3,4,5,6];
shuffle($numeros);
var_dump($numeros);

// Creando un array de otra manera
echo "<br> Creando un array con range!<br>";
$datos = range(2,10); //Limite inferior y Limite Superior
var_dump($datos);

echo "Y ahora con letras!";
$letras = range('b','l');
$letrasMayus = range('B','G');
var_dump($letras);
var_dump($letrasMayus);

// Para ver si hay un elemento en un array con in_array()
echo "<br> Vamos a comprobar si hay un elemento en un array! <br>";
$colores = ["negro", "morado", "naranja", "azul", "verde", "blanco"];
$miColor = 'rosa';

if (in_array($miColor, $colores)) {
    echo "<br> $miColor está en el array";
} else {
    echo "<br> $miColor no está en el array";
}

echo (in_array($miColor, $colores) ? "<br>$miColor está en el array" : "<br>$miColor no está en el array");