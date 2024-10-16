<?php

$tiposValidos = ['image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/webp'];
const TAM_MAX = 2000000; //2MB

function sanearCadenas(string $cadena) : string {
    return htmlspecialchars(trim($cadena));
}

function isEmailValido(string $email) : bool {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errEmail'] = "*** ERROR, el email no es válido. ***";
        return false;
    }
    return true;
}

function pintarErrores(string $error) : void {
    if (isset($_SESSION[$error])) {
        echo "<p class='text-red-500 italic text-sm mt-2'>{$_SESSION[$error]}</p>";
        unset($_SESSION[$error]);
    }
}

//función para verificar que el archivo subido sea una imagen y no ecceda los 2 MB en este ejemplo

function isImagenValida(string $tipo, int $size) : bool {
    global $tiposValidos;
    if (!in_array($tipo, $tiposValidos)) {
        $_SESSION['errImagen'] = "*** ERROR, se esperaba un archivo de imagen. ***";
        return false;
    }
    if ($size > TAM_MAX) {
        $_SESSION['errImagen'] = "*** ERROR, la imagen excede los 2MB permitidos. ***";
        return false;
    }
    return true;

}