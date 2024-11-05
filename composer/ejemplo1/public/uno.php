<?php

// En vez del autoload manual, llamamos al require del autoload
// puede ser también use Src\{Usuario, Cliente} para meter varias clases a la vez
use Src\Usuario;

require __DIR__."/../vendor/autoload.php";

$usuarios = Usuario::crearUsuarios(100);

var_dump($usuarios);