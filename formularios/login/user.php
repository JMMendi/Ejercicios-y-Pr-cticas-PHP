<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location:login.php");
    die();
}
$email = $_SESSION['usuario'];
$perfil = ($_SESSION['perfil']) ? "Administrador" : "Usuario";

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

<body style="background-color: silver">
    <h1 class="text-center text-2x1 font-bold p-12">Portal del Usuario</h1>
    <h2 class="text-center text-2x1 font-bold p-12">¡¡¿¿CON INFORMACIÓN SENSIBLE PERO LIGERAMENTE MENOS??!!</h2>

    <p class="font-bold">Usuario: <?php echo $email ?></p>
    <p class="font-bold">Perfil: <?php echo $perfil ?></p>


    <div class="mt-12 flex p-6 border-4 shadow-x1 rounded-x1 justify-around">
        <a href="sitio.php" class="mx-10 px-10 py-1 rounded text-white bg-green-500 hover:bg-green-700 font-bold mr-3">Volver al Portal <i class="fa-solid fa-house"></i></a>
        <?php if ($_SESSION['perfil']) {
            echo '<a href="admin.php" class="mx-10 px-10 py-1 rounded text-white bg-purple-500 hover:bg-purple-700 font-bold mr-2">Portal Administrador <i class="fa-sharp fa-solid fa-user-tie"></i></a>';
        } ?>
        <a href="cerrar.php" class="mx-10 px-10 py-1 rounded text-white bg-blue-500 hover:bg-blue-700 font-bold mr-3">Cerrar Sesión <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>

</body>

</html>