<?php
    session_start();
    if (!isset($_SESSION['usuario'])) { // Así, si no hay una sesión iniciada, impides que se entre de manera fraudulenta
        header("Location:login.php");
        die();
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
<body class="bg-silver-200">
    <h1 class="text-center text-2x1 font-bold p-12">Sitio de la Empresa</h1>
    <h2 class="text-center text-2x1 font-bold p-12">¡¡¿¿CON INFORMACIÓN SENSIBLE??!!</h2>
    <div class="mt-12 mx-auto">
        <a href="cerrar.php" class="mx-10 px-10 py-1 rounded text-white bg-blue-500 hover:bg-blue-700 font-bold">Cerrar Sesión</a>
    </div>
</body>
</html>