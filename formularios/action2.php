<?php
//Recogiendo los datos del formulario
include 'utilidades.php';

$email = htmlspecialchars(trim($_POST['email'])); // htmlspecialchars es para evitar virus y malware mediante el uso de scripts. Quita los caracteres
// de <>
$password = htmlspecialchars(trim($_POST["password"]));
$provincia = $_POST["provincia"];
$aficion = isset($_POST["aficiones"]) ? $_POST["aficiones"] : [];

// Vamos a obligar a que el email sea un email válido
// que la contraseña tenga al menos 5 caracteres
// las provincias esten en el array de provincias
// las aficiones esten en el array de aficiones
// y que al menos hayamos marcado una

// creamos un array de Errores donde guardar los distintos errores
$errores = [];

// validamos el email y la contraseña
if (strlen($password) < 5) {
    $errores[] = "El campo password debe tener al menos 5 caracteres.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "El campo email debe ser una dirección de correo electrónico válida.";
}

// validamos las aficiones
if ($aficion == []) {
    $errores[] = "Debe elegir una afición";
} else {
    foreach ($aficion as $item) {
        if (!in_array($item, $aficiones)) {
            $errores[] = "Error, la afición no es válida.";
            break;
        }
    }
}

// validamos las provincias
if (!in_array($provincia, $provincias)) {
    $errores[] = "Elija una provincia válida.";
}

if (count($errores)) {
    echo "<center><h3>** ERRRORES **</h3></center>";
    echo "<ol>";
    foreach ($errores as $error) {
        echo "<li>$error</li>";
    }
    echo "</ol>";
} else {
    echo "<center><h3>** Datos **</h3></center>";
    echo "<b>Email: </b>" . $email . "<br>";
    echo "<b>Password: </b>" . $password . "<br>";
    echo "<b>Provincia: </b>" . $provincia . "<br>";
    echo "<b>Aficiones: </b>";
    echo "<ol>";
    foreach ($aficion as $item) {
        echo "<li>$item</li>";
    }
    echo "</ol>";
}
