<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- method="GET" Y method="POST" --> <!-- Si haces GET, todo sale en la url sin proteger ni nada -->
    <form method="POST" action="action1.php">
        <input type="text" placeholder="Tu nombre ..." name="nombre" required/><br><br>
        <input type="email" placeholder="Tu email ..." name="email" required/><br><br>
        <input type="password" placeholder="Tu contraseña ..." name="pass" required/><br><br>

        <select name="provincias">
            <option>Almería</option>
            <option>Cádiz</option>
            <option>Huelva</option>
            <option>Jaén</option>
        </select>
        <br> <br>

        Elige un color: <br><br>
        <input type="radio" name="color" value="Blanco">Blanco</input><br>
        <input type="radio" name="color" value="Negro">Negro</input><br>
        <input type="radio" name="color" value="Rojo">Rojo</input><br><br>
        <!-- Si pones checked, te libras de problemas pero no es para nada seguro -->

        <br><br>
        Elige una afición:<br>
        <input type="checkbox" name="aficiones[]" value="deportes">Deportes</input>
        <input type="checkbox" name="aficiones[]" value="videojuegos">Videojuegos</input>
        <input type="checkbox" name="aficiones[]" value="fiesta">Fiesta</input>
        <input type="checkbox" name="aficiones[]" value="evadir_impuestos">Evadir Impuestos</input><br><br>


        <input type="submit" />
    </form>
    <?php
    
    
    ?>
</body>
</html>
