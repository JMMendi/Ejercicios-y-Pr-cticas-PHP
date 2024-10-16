<?php
session_start();
require "utilidades.php";
if (isset($_POST['email'])) {
    // Si estoy aquí, he enviado el formulario
    // 1. Recojo y limpio los datos
    $email = sanearCadenas($_POST['email']);
    $pass = sanearCadenas($_POST['password']);

    // 2. Control de Errores y Pintado de ellos
    $errores = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores = true;
        $_SESSION['errEmail'] = "*** Error, debes introducir un email válido. ***";
    }
    if (!isLongitudValida($pass, 5, 15)) {
        $errores = true;
        $_SESSION['errPass'] = "*** Error, la contraseña debe tener entre 5 y 15 caracteres. ***";
    }
    if ($errores) {
        header("Location: {$_SERVER['PHP_SELF']}"); // Esto carga la página y el die() hace que no se ejecute nada más
        die();
    }
    if (validarUsuario($email, $pass)) {
        $_SESSION['usuario'] = $email;

        // $_SESSION['perfil'] = $datosUsuario[1]; <---- Esto no puede ser ya que no podemos acceder al array de esta manera
        // a datosUsuario[1] por usar la función.

        $_SESSION['perfil'] = $usuarios[$email][1]; // <-- En el array usuarios, el email es la clave así que podemos acceder a su array y acceder a su perfil

        header("Location:sitio.php");
        die();
    }
    // Ahora que hemos pasado por esto, procedemos a validar los usuarios
    // foreach ($usuarios as $emailUsuario => $datosUsuario) {
    //     if ($email == $emailUsuario) {
    //         if (password_verify($pass, $datosUsuario[0])) // Esta funcion pasa una contraseña y mira si coincide con el hash
    //             $_SESSION['usuario'] = $email;
    //             $_SESSION['perfil'] = $datosUsuario[1];
    //             header("Location:sitio.php");
    //             die();
    /*} else {
                $_SESSION['errPassword'] = "*** Error, la contraseña para ese usuario no es válido. ***";
            } */
    $_SESSION['errLogin'] = "*** Error, email o password incorrectos. ***";
    header("Location: {$_SERVER['PHP_SELF']}");
    die();
}
// Si llego hasta aquí es porque no hay un login válido

//}    



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
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo">
                Flowbite
            </a>
            <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Sign in to your account
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu email">
                            <?php pintarErrores('errEmail') ?>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php pintarErrores('errPass'); ?>
                            <?php pintarErrores('errLogin'); ?>
                            <!-- <?php pintarErrores('errPassword'); ?> -->
                        </div>
                        <button type="submit" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-primary-800">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>