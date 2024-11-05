<?php
namespace App;

class Utils {
    public static function sanearCadenas(string $cadena) : string {
        return trim(htmlspecialchars($cadena));
    }

    public static function establecerLimite(string $nomCampo, string $valor, int $min, int $max) : bool {
        if (strlen($valor) < $min || strlen($valor) > $max) {
            $_SESSION["err_$nomCampo"] = "***Error, el campo $nomCampo debe estar entre $min y $max caracteres.***";
            return false;
        }
        return true;
    }

    public static function isCampoNumberOk(string $nomCampo, int|float $valor, int $min, float $max) {
        if (($valor) < $min || ($valor) > $max) {
            $_SESSION["err_$nomCampo"] = "***Error, el campo $nomCampo debe estar entre $min y $max.***";
            return false;
        }
        return true;
    }
 
    public static function existeNombre(string $nombreArt, ?int $id=null) : bool {
        if (Articulo::existeArticulo($nombreArt, $id)) {
            $_SESSION['err_nombre'] = "***Error, el nombre del artículo ya existe. No puede haber duplicados.***";
            return true;
        }
        return false;
    }

    public static function pintarErrores($nomError) : void {
        if (isset($_SESSION[$nomError])) {
            echo "<p class='text-red-700 italic mt-2 text-sm'>{$_SESSION[$nomError]}</p>";
            unset($_SESSION[$nomError]);
            
        }
    }
}
