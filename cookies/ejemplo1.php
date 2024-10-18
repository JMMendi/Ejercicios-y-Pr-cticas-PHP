<?php
    if (isset($_POST['btn'])) { // Esto es para que, al darle al botón, destuir la cookie
        setcookie('contador', $contador, time() - 100);
        header("Location:ejemplo1.php");
        exit();
    }
    //Ejemplo de cookie que cuenta cuantas veces he visitado la página
    if(isset($_COOKIE['contador'])){
        // Como ya existe la cookie contador, aumentamos el valor en uno
        $contador = $_COOKIE['contador']+1;
    } else {
        // Si no existe, es que es nuestra primera visita. Inicializamos a uno
        $contador = 1;
    }
    // Actualizamos el valor de la cookie. dándole una duración de 30 días
    setcookie('contador', $contador, time()+(30*24*60*60));
    // El nombre de la cookie, el string(o valor $), time() para coger la fecha del sistema y el (30*24*60*60) para 30 días

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cookies</title>
</head>
<body>
    <h1>Hola tú</h1>
    <h2>Ha visitado usted está página un total de: <?php echo $contador; ?> , ole tú</h2>
    <form method="POST">
        <button name="btn" value="Destruir Cookie" id="btn">Destruir Cookie</button>

    </form>
</body>
</html>