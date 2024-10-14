<?php
session_start();

// require '../utilidades.php';
require __DIR__."/../utilidades.php"; // Otra manera de localizar y coger el archivo. __DIR__ es una constante con la ruta en la que estoy

if (isset($_POST['btnGuardar'])) {
    //procesamos el formulario
    // 1 - Recogemos los datos y saneamos y limpiamos

    /* $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $provincia = htmlspecialchars(trim($_POST['provincias']));
    $aficion (isset($_POST['aficiones'])) ? htmlspecialchars(trim($_POST['aficiones'])) : -1; */

    // Podemos hacer lo de arriba O poner una función en utilidades.php e invocarla.
    $email = limpiarCadenas($_POST['email']);
    $password = limpiarCadenas($_POST['password']);
    $provincia = limpiarCadenas($_POST['provincias']);
    $aficion (isset($_POST['aficiones'])) ? ($_POST['aficiones']) : -1 ;

    // Validaciones (password al menos 5 caracteres y no más de 15, email valido, alguna aficion escogida y provincia y que existan en el array.)
    $errores = false;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores = true;
        $_SESSION['errEmail'] = "*** El email no es válido. ***";
    };
    if (strlen($password) < 5 || strlen($password) > 15) {
        $errores = true;
        $_SESSION['errPass'] = "*** La contraseña no tiene entre 5 y 15 caracteres. ***";
    };
    if (!in_array($provincia, $provincias)) {
        $errores = true;
        $_SESSION['errProv'] = "*** Tienes que escoger una provincia válida. ***";
    };
    if ($aficion == -1) {
        $errores = true;
        $_SESSION['errAfi'] = "*** Debe escoger alguna afición válida. ***";
    } else {
        foreach ($aficion as $item) {
            if (!in_array($item, $aficiones)){
                $errores = true;
                $_SESSION['errAfi'] = "*** No es una afición de la lista. ***";
                break;
            }
        }
    }

    if($errores) {
        header("Location:".__DIR__);
    } else {
        // muestro los datos
        echo "<br>Datos Correctos <br>";
        echo "Email: $email<br>";
        echo "Password: $password<br>";
        echo "Provincia: $provincia<br>";
        echo "Aficiones: <br><ol>";
            foreach ($aficion as $item) {
                echo "<li>$item</li><br>";
            }
        echo "</ol>";
    }


} else{
    //pintamos el documento.

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CDN Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>
    <form method="POST" action=" <?php echo $_SERVER['PHP_SELF'] ?>" class="w-96 mx-auto">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com"  />
            <?php pintarErrores('errEmail'); ?>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
            <?php pintarErrores('errPass'); ?>
        </div>
        <div class="mb-5">
            <label for="provincias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="provincias" name="provincias" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>---Elige una provincia---</option>
                <?php
                foreach ($provincias as $provincia) {
                    echo "<option>" . $provincia . "</option>\n";
                }
                ?>
            </select>
            <?php pintarErrores('errProv'); ?>
        </div>
        <div class="flex mb-5">
            <?php
            foreach ($aficiones as $aficion) {
                $minuscula = strtolower($aficion);
                echo <<< TXT
                    <div class="flex items-center me-4">
                        <input id="$aficion" name="aficiones[]" type="checkbox" value="$minuscula" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="$aficion" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">$aficion</label>
                    </div>
                TXT;
            }
            ?>
            <?php echo "<br>"; pintarErrores('errAfi'); ?>

        </div>
        <button name="btnGuardar" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="mr-3 fa-solid fa-floppy-disk"></i>Enviar Formulario</button>
    </form>
</body>

</html>

<?php

        }
?>