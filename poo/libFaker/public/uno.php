<?php

use src\utils\Faker;
use const src\utils\DOS_APELLIDOS;
use src\Usuario;

spl_autoload_register(function(string $className) {
    $ruta = str_replace("\\", "/", $className);
    require __DIR__."../$ruta.php";
});

$cantidad = 100;
$usuarios = [];

for($i = 0 ; $i < $cantidad ; $i++) {
    $nombre = Faker::getNombre();
    $apellido = Faker::getApellidos(DOS_APELLIDOS);
    $pais = Faker::getPais();
    $perfil = Faker::getPerfil();

    $usuario = (new Usuario)
    ->setNombre($nombre)
    ->setApellidos($apellido)
    ->setPais($pais)
    ->setPerfil($perfil);
    $usuarios [] = $usuario; 
}

var_dump($usuarios);