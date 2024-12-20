<?php

namespace src\utils;

require "Constantes.php";

class Faker {
    public static function getNombre() : string {
        $clave = array_rand(NOMBRES);
        return NOMBRES[$clave];
    }

    public static function getApellidos(int $cantidad=UN_APELLIDO) : string {
        if($cantidad == UN_APELLIDO) {
            $clave=random_int(0, count(APELLIDOS)-1);
            return APELLIDOS[$clave];
        }
        $clave1 = random_int(0, count(APELLIDOS)-1);
        $clave2 = random_int(0, count(APELLIDOS)-1);

        return APELLIDOS[$clave1]." ".APELLIDOS[$clave2];
    } 
    public static function getPais() : string {
        $clave = array_rand(PAISES);
        return PAISES[$clave];
    }

    public static function getPerfil() : string {
        $clave = array_rand(PERFIL);
        return PERFIL[$clave];
    }

}