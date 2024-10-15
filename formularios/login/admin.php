<?php
    session_start();
    // Que no te deje entrar a menos de que estés logeado y seas administrador
    if (!isset($_SESSION['usuario'])) {
        header("Location:login.php");
        die();
    }
    if (!$_SESSION['perfil']) {
        header("Location:sitio.php");
        die();
    }
    $email = $_SESSION['usuario'];
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

<body class="p-12 bg-red-200">
    <h1 class="text-center text-2x1 font-bold p-12">Sitio del Administrador</h1>
    <h2 class="text-center text-2x1 font-bold p-12">¡¡¿¿CON INFORMACIÓN AÚN MÁS SENSIBLE??!!</h2>

    <p class="font-bold">Usuario: <?php echo $email ?></p>

    <div class="mt-12 flex p-6 border-4 shadow-x1 rounded-x1 justify-around">
        <a href="user.php" class="mx-10 px-10 py-1 rounded text-white bg-green-500 hover:bg-green-700 font-bold mr-2">Sitio User <i class="fa-solid fa-user"></i></a>

        <a href="sitio.php" class="mx-10 px-10 py-1 rounded text-white bg-green-500 hover:bg-green-700 font-bold mr-3">Volver al Portal <i class="fa-solid fa-house"></i></a>

        <a href="cerrar.php" class="mx-10 px-10 py-1 rounded text-white bg-blue-500 hover:bg-blue-700 font-bold mr-3">Cerrar Sesión <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>

</body>

</html>