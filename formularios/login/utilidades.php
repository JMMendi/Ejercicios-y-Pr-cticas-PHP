<?php

$usuarios = [
    'admin@gmail.com' => ['$2y$10$Bm6J9QtXhikX7CgYNQe.dewOa6l7V9uH8AXHq6lBG8j6/yUi5if5S', true],
    'user1@gmail.com' => ['$2y$10$Bm6J9QtXhikX7CgYNQe.dewOa6l7V9uH8AXHq6lBG8j6/yUi5if5S', false],
    'user2@gmail.com' => ['$2y$10$Bm6J9QtXhikX7CgYNQe.dewOa6l7V9uH8AXHq6lBG8j6/yUi5if5S', false],
    'user3@gmail.com' => ['$2y$10$Bm6J9QtXhikX7CgYNQe.dewOa6l7V9uH8AXHq6lBG8j6/yUi5if5S', false],

];
// echo password_hash("secret0", PASSWORD_BCRYPT);

function sanearCadenas(string $cadena) : string {
    return htmlspecialchars(trim($cadena));
}

function isLongitudValida(string $cadena, int $min, int $max) : bool {
    return !(strlen($cadena) < $min || strlen($cadena) > $max);
}

function pintarErrores(string $nombre) {
    if(isset($_SESSION[$nombre])) {
        echo "<p class='italic text-red-600 text-sm mt-2'>{$_SESSION[$nombre]}</p>";
        unset($_SESSION[$nombre]);
    }
}

function validarUsuario(string $email, string $password) : bool {
    global $usuarios;
    foreach ($usuarios as $emailUsuario => $datosUsuario) {
        if ($email == $emailUsuario) {
            if (password_verify($password, $datosUsuario[0])) // Esta funcion pasa una contraseña y mira si coincide con el hash
                return true;
        }
    }
    return false;
}