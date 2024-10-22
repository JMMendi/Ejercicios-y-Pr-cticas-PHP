<?php

/* require __DIR__."/../src/Backend/Cliente.php";
require __DIR__."/../src/Frontend/Cliente.php"; */

// Se masca la tragedia

// $clienteB = new Cliente("Manolo Backend");
// $clienteF = new Cliente("María Frontend");


// Usando la extensión PHP namespace resolver hacemos esto en vez de los require

use src\Backend\Admin\Conexion;
use src\Backend\Cliente;
use src\Frontend\Cliente as ClienteF;
use src\Utils;

use const src\MAY_ON;

// Como no podemos usar un use para cosas de igual nombre, hacemos como en Bases de datos. Le damos un alias! como ClienteF

spl_autoload_register(function(string $className) {
    $ruta = str_replace("\\", "/", $className);
    // echo "./../$ruta.php<br>";
    // die();
    require("./../".$ruta.".php");
});

// ahora si queremos crear un cliente, nos pide QUE cliente (si Frontend o Backend)
Utils::saludo("Andrés");
$cliente1 = new Cliente("Pepe");

// Ves la declaración? Usamos el alias -- **Importante. Si se te olvida, intentando declararlo el plugin te crea el alias automáticamente** --
$cliente2 = new ClienteF("Juan");
Conexion::saludoAdmin();

// En Utils.php tenemos constantes, si las queremos traer simplemente las invocamos y el plugin hace el use

echo MAY_ON;