<?php
    session_start(); // SIEMPRE QUE TRABAJEMOS CON SESIONES
    if(isset($_POST['btnEnviar'])) {
        // echo "Formulario enviado";
        $email = htmlspecialchars(trim($_POST['email']));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errEmail'] = "*** Error debes introducir un email válido. ***"; // Puede ser cualquier tipo de valor
            header("Location: ". $_SERVER['PHP_SELF']); // Esto es para recargar la página actual después de poner el error.
        } else {
            echo "Email correcto.";
        }
    } else {


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

<body class="bg-purple-100">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-96 mx-auto"> <!-- Mira el action. Así siempre se autorreferencia la página sin poner el nombre. -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" />
            <?php pintarErrores('errEmail') ?>
        </div>
        <button name="btnEnviar" class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="mr-3 fa-solid fa-floppy-disk"></i>Enviar Formulario</button>
    </form>

</body>

</html>

<?php
    }
?>