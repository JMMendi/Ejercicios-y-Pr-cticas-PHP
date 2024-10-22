<?php

use src\Cliente;
use src\PlanFactory;

spl_autoload_register(function(string $class){
    $ruta = str_replace("\\", "/", $class);
    // No hay que poner el src, que ya te lo pone el $class
    require "../$ruta.php";
});

$manolo = new Cliente(12500);

$planManolo = (new PlanFactory)->getPlan($manolo);

echo "<br>".$planManolo::class."<br>";

$pvp = $manolo->getPrecioFinal($planManolo->getDescuento());

echo "Manolo se ha gastado 12500€ pero pagarás $pvp €";