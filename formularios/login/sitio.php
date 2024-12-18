<?php
session_start();
if (!isset($_SESSION['usuario'])) { // Así, si no hay una sesión iniciada, impides que se entre de manera fraudulenta
    header("Location:login.php");
    die();
}

// tengo una variable de sesión perfil que será true si soy admin y si no, false.

$perfil = ($_SESSION['perfil']) ? "Administrador" : "Usuario";
$colorFondo = ($_SESSION['perfil']) ? "#f5b7b1" : "silver";
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

<body class="p-12" style="background-color:<?php echo $colorFondo ?> ">
    <h1 class="text-center text-2x1 font-bold p-12">Sitio de la Empresa</h1>
    <h2 class="text-center text-2x1 font-bold p-12">¡¡¿¿CON INFORMACIÓN SENSIBLE??!!</h2>
    <p class="font-bold">Usuario: <?php echo $email ?></p>
    <p class="font-bold">Perfil: <?php echo $perfil ?></p>
    <div class="mt-12 flex p-6 border-4 shadow-x1 rounded-x1 justify-around">
        <a href="user.php" class="mx-10 px-10 py-1 rounded text-white bg-green-500 hover:bg-green-700 font-bold mr-2">Sitio User <i class="fa-solid fa-user"></i></a>
        
        <?php if ($_SESSION['perfil']) {
            echo '<a href="admin.php" class="mx-10 px-10 py-1 rounded text-white bg-purple-500 hover:bg-purple-700 font-bold mr-2">Portal Administrador <i class="fa-sharp fa-solid fa-user-tie"></i></a>';
        } ?>
        
        <a href="cerrar.php" class="mx-10 px-10 py-1 rounded text-white bg-blue-500 hover:bg-blue-700 font-bold mr-2 ">Cerrar Sesión <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
    </div>
</body>

</html>