<?php
// CON EL GET
// $nombre = $_GET['nombre']; // Hay que recoger en el GET el name de cada valor del formulario del html
// $email=$_GET['email'];
// $pass=$_GET['pass'];

// CON EL POST
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$prov=$_POST['provincias'];

// $color=$_POST['color']; // Si no seleccionas ningún color, te da error. En Radio y en Checks nunca envía valores vacíos Y esto es INTERESANTE para errores.
// Lo de arriba ES MUY IMPORTANTE
$color=(isset($_POST['color'])) ? $_POST['color'] : "Ninguno"; // Y así podemos gestionarlo si quieres enviar un dato obligatoriamente

$aficion = [];
$aficion=(isset($_POST['aficiones'])) ? $_POST['aficiones'] : [] ;

var_dump($_POST);
// die();

// El $_REQUEST Puede machacar datos. Mejor no usarlo!

// $nombre = $_REQUEST['nombre'];
// $email = $_REQUEST['email'];
// $pass = $_REQUEST['pass'];


// Basicamente $_POST Y $_GET son arrays asociativas. el name del html es el índice y lo que metes dentro es el valor
echo "El nombre es $nombre, el email es $email y su contraseña es $pass de la provincia de $prov y ha escogido el color $color y sus aficiones son: ";
if (count($aficion)) {
    foreach ($aficion as $item) {
        echo "$item, ";
    } 
} else {
    echo "No tiene aficiones.";
}

echo "<br>";
echo "<a href=`'uno.php'>Volver</a>";