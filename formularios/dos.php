<?php
// include, include_once, require, require_once -- Los once tienen una carga en el procesador y memoria grande. Mejor no abusar de ellos y evitarlos si se pueden
// include incluye el archivo y si no puede, sigue ejecutando el php. El require si no lo consigue incluir, para todo el código.
// Y los once verifican que no haya duplicados del archivo a incluir.

require 'utilidades.php';

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
    <form method="POST" action="action2.php" class="w-96 mx-auto">
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com" required />
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
            <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
        </div>
        <div class="mb-5">
            <label for="provincias" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
            <select id="provincias" name="provincia" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>---Elige una provincia---</option>
                <?php
                foreach ($provincias as $provincia) {
                    echo "<option>" . $provincia . "</option>\n";
                }
                ?>
            </select>
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
        </div>
        <button class="bg-blue-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"><i class="mr-3 fa-solid fa-floppy-disk"></i>Enviar Formulario</button>
    </form>
</body>

</html>