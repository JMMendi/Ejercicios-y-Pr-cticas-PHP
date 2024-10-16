<?php
    session_start();

    require "utilidades.php";

    if(isset($_POST['email'])) {
        // var_dump($_FILES['foto']); // mira como pone $_FILES
        // die();

        $email = sanearCadenas($_POST['email']);
        
        $errores = false;

        if(!isEmailValido($email)) {
            $errores = true;
        }

        $_SESSION['rutaImagen']='/img/noimage.png';

        if($errores) {
            header("Location:".$_SERVER['PHP_SELF']); // PHP_SELF ?
            die(); // exit();
        }
    }
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

<body class="p-12 bg-teal-200">
    <h3 class="text-xl font-semibold text-center">Editar Perfil</h3>
    <div class="p-8 mx-auto w-1/2 border-3 rounded-xl shadow-xl">
        <form action="uno.php" method="POST" enctype="multipart/form-data"> <!-- Si no ponemos en el enctype="multipart/form-data" no nos va a dejar subir archivos -->
            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introduce tu email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tu email">
                <?php pintarErrores('errEmail') ?>
            </div>
            <div class="mt-4 flex">
                <div class="mr-7">
                    <label for="foto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Introduce tu archivo</label>
                    <input type="file" name="foto" id="foto" accept="image/*" oninput="campoImg.src=window.URL.createObjectURL(this.files[0])"> <!-- El accept es para poner por defecto que muestre en el Examinar archivos de imagen -->
                </div>
                <div>
                    <img src="img/default.jpg" id="campoImg" class="w-full h-92 border-2 object-center object-cover" />
                </div>
            </div>
            <div class="mt-4 flex justify-between">
                <input type="submit" class="px-3 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-xl"></input>
                <input type="reset" class="px-3 py-2 bg-orange-500 hover:bg-orange-700 text-white font-bold rounded-xl"></input>

            </div>
        </form>
    </div>
</body>

</html>