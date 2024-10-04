<?php



if(!isset($_GET['numero'])) {
    die("Error, Introduce un número en la url");
}
$numero=(int)$_GET['numero'];
if($numero == 0) {
    die("Error, Introduce un número mayor de 0 en la url");
}
for ($i = 2 ; $i < $numero ; $i++) {
    $bandera = true;
    if ($numero % $i == 0) {
        $bandera = false;
        break;
    }
}

echo ($bandera) ? "$numero ES PRIMO" : "$numero NO ES PRIMO";