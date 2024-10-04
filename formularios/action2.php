<?php
//Recogiendo los datos del formulario

$email = htmlspecialchars(trim($_POST['email'])); // htmlspecialchars es para evitar virus y malware mediante el uso de scripts. Quita los caracteres
// de <>
$password = trim($_POST["password"]);
$provincia = $_POST["provincias"];
$aficion = isset($_POST["aficiones"]) ? $_POST["aficiones"] : [];

// Vamos a obligar a que el email sea un email válido
// que la contraseña tenga al menos 5 caracteres
// las provincias esten en el array de provincias
// las aficiones esten en el array de aficiones
// y que al menos hayamos marcado una